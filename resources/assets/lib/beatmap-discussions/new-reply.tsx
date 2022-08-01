// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BigButton from 'components/big-button';
import UserAvatar from 'components/user-avatar';
import BeatmapJson from 'interfaces/beatmap-json';
import BeatmapsetDiscussionJson from 'interfaces/beatmapset-discussion-json';
import { BeatmapsetDiscussionPostStoreResponseJson } from 'interfaces/beatmapset-discussion-post-responses';
import BeatmapsetJson from 'interfaces/beatmapset-json';
import CurrentUserJson from 'interfaces/current-user-json';
import { route } from 'laroute';
import { action, makeObservable, observable, runInAction } from 'mobx';
import { observer } from 'mobx-react';
import core from 'osu-core-singleton';
import * as React from 'react';
import TextareaAutosize from 'react-autosize-textarea';
import { onError } from 'utils/ajax';
import { validMessageLength } from 'utils/beatmapset-discussion-helper';
import { InputEventType, makeTextAreaHandler, TextAreaCallback } from 'utils/input-handler';
import { hideLoadingOverlay, showLoadingOverlay } from 'utils/loading-overlay';
import MessageLengthCounter from './message-length-counter';

const bn = 'beatmap-discussion-post';

interface Props {
  beatmapset: BeatmapsetJson;
  currentBeatmap: BeatmapJson;
  currentUser: CurrentUserJson;
  discussion: BeatmapsetDiscussionJson & Required<Pick<BeatmapsetDiscussionJson, 'current_user_attributes'>>;
}

const actionIcons = {
  reply: 'fas fa-reply',
  reply_reopen: 'fas fa-exclamation-circle',
  reply_resolve: 'fas fa-check',
};

const actionResolveLookup = {
  reply_reopen: false,
  reply_resolve: true,
} as Record<string, boolean | undefined>;

@observer
export class NewReply extends React.Component<Props> {
  @observable private readonly box = React.createRef<HTMLTextAreaElement>();
  @observable private editing = osu.present(this.storedMessage);
  private readonly handleKeyDown;
  @observable private message = this.storedMessage;
  @observable private posting: string | null = null;
  private postXhr: JQuery.jqXHR<BeatmapsetDiscussionPostStoreResponseJson> | null = null;

  private get canReopen() {
    return this.props.discussion.can_be_resolved && this.props.discussion.current_user_attributes.can_reopen;
  }

  private get canResolve() {
    return this.props.discussion.can_be_resolved && this.props.discussion.current_user_attributes.can_resolve;
  }

  private get isTimeline() {
    return this.props.discussion.timestamp != null;
  }

  private get storageKey() {
    return `beatmapset-discussion:reply:${this.props.discussion.id}:message`;
  }

  private get storedMessage() {
    return localStorage.getItem(this.storageKey) ?? '';
  }

  private get validPost() {
    return validMessageLength(this.message, this.isTimeline);
  }

  constructor(props: Props) {
    super(props);
    makeObservable(this);

    this.handleKeyDown = makeTextAreaHandler(this.handleKeyDownCallback);
  }

  componentDidUpdate(prevProps: Readonly<Props>) {
    if (prevProps.discussion.id !== this.props.discussion.id) {
      this.message = this.storedMessage;
      return;
    }

    if (this.editing) {
      this.box.current?.focus();
    }

    this.storeMessage();
  }

  componentWillUnmount() {
    this.postXhr?.abort();
  }

  render() {
    return this.editing ? this.renderBox() : this.renderPlaceholder();
  }

  @action
  private readonly editStart = () => {
    if (core.userLogin.showIfGuest(this.editStart)) return;
    this.editing = true;
  };

  @action
  private readonly handleKeyDownCallback: TextAreaCallback = (type, event) => {
    switch (type) {
      case InputEventType.Cancel:
        this.editing = false;
        break;
      case InputEventType.Submit:
        this.post(event);
        break;
    }
  };

  @action
  private readonly onCancelClick = () => {
    if (osu.present(this.message) && !confirm(osu.trans('common.confirmation_unsaved'))) return;

    this.editing = false;
    this.message = '';
  };

  @action
  private readonly post = (event: React.SyntheticEvent<HTMLElement>) => {
    if (!this.validPost || this.postXhr != null) return;
    showLoadingOverlay();

    // in case the event came from input box, do 'reply'.
    const postAction = event.currentTarget.dataset.action ?? 'reply';
    this.posting = postAction;

    const data = {
      // Only add resolved flag to beatmap_discussion if there was an
      // explicit change (resolve/reopen); undefined is not sent.
      beatmap_discussion: { resolved: actionResolveLookup[postAction] },
      beatmap_discussion_id: this.props.discussion.id,
      beatmap_discussion_post: {
        message: this.message,
      },
    };

    this.postXhr = $.ajax(route('beatmapsets.discussions.posts.store'), {
      data,
      method: 'POST',
    });

    this.postXhr
      .done((json) => runInAction(() => {
        this.editing = false;
        this.message = '';
        $.publish('beatmapDiscussionPost:markRead', { id: json.beatmap_discussion_post_ids });
        $.publish('beatmapsetDiscussions:update', { beatmapset: json.beatmapset });
      }))
      .fail(onError)
      .always(action(() => {
        hideLoadingOverlay();
        this.postXhr = null;
        this.posting = null;
      }));
  };

  private renderBox() {
    return (
      <div className={`${bn} ${bn}--reply ${bn}--new-reply`}>
        {this.renderCancelButton()}
        <div className={`${bn}__content`}>
          <div className={`${bn}__avatar`}>
            <UserAvatar modifiers='full-rounded' user={this.props.currentUser} />
          </div>
          <div className={`${bn}__message-container`}>
            <TextareaAutosize
              ref={this.box}
              className={`${bn}__message ${bn}__message--editor`}
              disabled={this.posting != null}
              onChange={this.setMessage}
              onKeyDown={this.handleKeyDown}
              placeholder={osu.trans('beatmaps.discussions.reply_placeholder')}
              value={this.message}
            />
          </div>
        </div>

        <div className={`${bn}__footer ${bn}__footer--notice`}>
          {osu.trans('beatmaps.discussions.reply_notice')}
          <MessageLengthCounter isTimeline={this.isTimeline} message={this.message} />
        </div>

        <div className={`${bn}__footer`}>
          <div className={`${bn}__actions`}>
            <div className={`${bn}__actions-group`}>
              {this.canResolve && !this.props.discussion.resolved && this.renderReplyButton('reply_resolve')}

              {this.canReopen && this.props.discussion.resolved && this.renderReplyButton('reply_reopen')}

              {this.renderReplyButton('reply')}
            </div>
          </div>
        </div>
      </div>
    );
  }

  private renderCancelButton() {
    return (
      <button
        className={`${bn}__action ${bn}__action--cancel`}
        disabled={this.posting != null}
        onClick={this.onCancelClick}
      >
        <i className='fas fa-times' />
      </button>
    );
  }

  private renderPlaceholder() {
    const [text, icon, disabled] = this.props.currentUser.id != null
      ? [osu.trans('beatmap_discussions.reply.open.user'), 'fas fa-reply', this.props.currentUser.is_silenced]
      : [osu.trans('beatmap_discussions.reply.open.guest'), 'fas fa-sign-in-alt', false];

    return (
      <div className={`${bn} ${bn}--reply ${bn}--new-reply ${bn}--new-reply-placeholder`}>
        <BigButton
          disabled={disabled}
          icon={icon}
          modifiers='beatmap-discussion-reply-open'
          props={{ onClick: this.editStart }}
          text={text}
        />
      </div>
    );
  }

  private renderReplyButton(postAction: keyof typeof actionIcons) {
    return (
      <div className={`${bn}__action`}>
        <BigButton
          disabled={!this.validPost || this.posting != null}
          icon={actionIcons[postAction]}
          isBusy={this.posting === postAction}
          props={{
            'data-action': postAction,
            onClick: this.post,
          }}
          text={osu.trans(`common.buttons.${postAction}`)}
        />
      </div>
    );
  }

  @action
  private readonly setMessage = (e: React.ChangeEvent<HTMLTextAreaElement>) => {
    this.message = e.target.value;
  };

  private storeMessage() {
    if (!osu.present(this.message)) {
      localStorage.removeItem(this.storageKey);
    } else {
      localStorage.setItem(this.storageKey, this.message);
    }
  }
}