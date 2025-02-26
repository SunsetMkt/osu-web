<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'pinned_topics' => 'Gepinde Topics',
    'slogan' => "het is gevaarlijk om alleen te spelen.",
    'subforums' => 'Subforums',
    'title' => 'Forums',

    'covers' => [
        'edit' => 'Wijzig omslagfoto',

        'create' => [
            '_' => 'Stel omslagfoto in',
            'button' => 'Afbeelding uploaden',
            'info' => 'De grootte van de omslagfoto moet :dimensions zijn. Je kunt hier ook een afbeelding slepen en neerzetten om hem te uploaden.',
        ],

        'destroy' => [
            '_' => 'Verwijder omslagfoto',
            'confirm' => 'Weet je zeker dat je de omslagfoto wilt verwijderen?',
        ],
    ],

    'forums' => [
        'forums' => 'Forums',
        'latest_post' => 'Laatste bericht',

        'index' => [
            'title' => 'Forum Overzicht',
        ],

        'topics' => [
            'empty' => 'Geen topics!',
        ],
    ],

    'mark_as_read' => [
        'forum' => 'Markeer forum als gelezen',
        'forums' => 'Markeer forums als gelezen',
        'busy' => 'Markeren als gelezen...',
    ],

    'post' => [
        'confirm_destroy' => 'Will je deze post echt verwijderen?',
        'confirm_restore' => 'Will je deze post echt terugzetten?',
        'edited' => 'Laatst bewerkt door :user op :when. :count keer bewerkt in totaal.',
        'posted_at' => 'gepost op :when',
        'posted_by_in' => 'gepost door :username in :forum',

        'actions' => [
            'destroy' => 'Verwijder bericht',
            'edit' => 'Bewerk bericht',
            'report' => 'Rapporteer bericht',
            'restore' => 'Herstel bericht',
        ],

        'create' => [
            'title' => [
                'reply' => 'Nieuw antwoord',
            ],
        ],

        'info' => [
            'post_count' => ':count_delimited bericht|:count_delimited berichten',
            'topic_starter' => 'Onderwerp Starter',
        ],
    ],

    'search' => [
        'go_to_post' => 'Ga naar bericht',
        'post_number_input' => 'geef bericht nummer',
        'total_posts' => ':posts_count berichten totaal',
    ],

    'topic' => [
        'confirm_destroy' => 'Topic echt verwijderen?',
        'confirm_restore' => 'Topic echt herstellen?',
        'deleted' => 'topic verwijderd',
        'go_to_latest' => 'bekijk nieuwste post',
        'go_to_unread' => '',
        'has_replied' => 'Je hebt gereageerd op dit onderwerp',
        'in_forum' => 'in :forum ',
        'latest_post' => ':when door :user',
        'latest_reply_by' => 'laatste bericht door :user',
        'new_topic' => 'Nieuw onderwerp',
        'new_topic_login' => 'Log in om een nieuwe topic te maken',
        'post_reply' => 'Plaatsen',
        'reply_box_placeholder' => 'Typ hier om te antwoorden',
        'reply_title_prefix' => 'Re',
        'started_by' => 'door :user',
        'started_by_verbose' => 'gestart door :user',

        'actions' => [
            'destroy' => 'Topic verwijderen',
            'restore' => 'Herstel topic',
        ],

        'create' => [
            'close' => 'Sluiten',
            'preview' => 'Voorbeeld',
            // TL note: this is used in the topic reply preview, when
            // the user goes back from previewing to editing the reply
            'preview_hide' => 'Schrijf',
            'submit' => 'Plaatsen',

            'necropost' => [
                'default' => 'Dit onderwerp is al een tijdje inactief. Maak alleen een post hier als je een specifieke reden daarvoor hebt.',

                'new_topic' => [
                    '_' => "Dit onderwerp is al een tijdje inactief. Als je geen specifieke reden hebt om hier te posten, :create in plaats daarvan.",
                    'create' => 'maak een topic aan',
                ],
            ],

            'placeholder' => [
                'body' => 'Typ post inhoud hier',
                'title' => 'Klik hier om een titel in te stellen',
            ],
        ],

        'jump' => [
            'enter' => 'klik hier om een specifiek postnummer op te geven',
            'first' => 'ga naar eerste post',
            'last' => 'ga naar laatste post',
            'next' => 'sla 10 posts over',
            'previous' => 'ga 10 posts terug',
        ],

        'logs' => [
            '_' => 'Topic logs',
            'button' => 'Blader door topic logs',

            'columns' => [
                'action' => 'Actie',
                'date' => 'Datum',
                'user' => 'Gebruiker',
            ],

            'data' => [
                'add_tag' => '":tag" tag toegevoegd',
                'announcement' => 'topic gepind en gemarkeerd als aankondiging',
                'edit_topic' => 'naar :title',
                'fork' => 'van :topic',
                'pin' => 'topic gepind',
                'post_operation' => 'geplaatst door :username',
                'remove_tag' => '":tag" tag verwijderd',
                'source_forum_operation' => 'van :forum',
                'unpin' => 'topic geontpind',
            ],

            'no_results' => 'geen logs gevonden...',

            'operations' => [
                'delete_post' => 'Bericht verwijderd',
                'delete_topic' => 'Topic verwijderd',
                'edit_topic' => 'Topic titel veranderd',
                'edit_poll' => 'Onderwerpsstemming gewijzigd',
                'fork' => 'Topic gekopieerd',
                'issue_tag' => 'Uitgegeven tag',
                'lock' => 'Topic vergrendeld',
                'merge' => 'Berichten samengevoegd naar deze topic',
                'move' => 'Topic verplaatst',
                'pin' => 'Topic gepind',
                'post_edited' => 'Bericht bewerkt',
                'restore_post' => 'Bericht hersteld',
                'restore_topic' => 'Topic hersteld',
                'split_destination' => 'Gesplitste berichten verplaatst',
                'split_source' => 'Berichten gesplitst',
                'topic_type' => 'Topic type ingesteld',
                'topic_type_changed' => 'Topic type veranderd',
                'unlock' => 'Topic ontgrendeld',
                'unpin' => 'Topic geontpind',
                'user_lock' => 'Eigen topic vergrendeld',
                'user_unlock' => 'Eigen topic ongrendeld',
            ],
        ],

        'post_edit' => [
            'cancel' => 'Annuleren',
            'post' => 'Opslaan',
        ],
    ],

    'topic_watches' => [
        'index' => [
            'title_compact' => 'forum abonnementen',

            'box' => [
                'total' => 'Geabonneerde topics',
                'unread' => 'Topics met nieuwe berichten',
            ],

            'info' => [
                'total' => 'Je bent geabonneerd op :total topics.',
                'unread' => 'Je hebt :unread ongelezen berichten in geabonneerde berichten.',
            ],
        ],

        'topic_buttons' => [
            'remove' => [
                'confirmation' => 'Uitschrijven van topic?',
                'title' => 'Uitschrijven',
            ],
        ],
    ],

    'topics' => [
        '_' => 'Onderwerpen',

        'actions' => [
            'login_reply' => 'Log in om te antwoorden',
            'reply' => 'Beantwoorden',
            'reply_with_quote' => 'Citeer post voor antwoord',
            'search' => 'Zoek',
        ],

        'create' => [
            'create_poll' => 'Peiling Aanmaken',

            'preview' => 'Plaats voorbeeld',

            'create_poll_button' => [
                'add' => 'Maak een Peiling aan',
                'remove' => 'Annuleer aanmaken van peiling',
            ],

            'poll' => [
                'hide_results' => 'Verberg de resultaten van de poll.',
                'hide_results_info' => 'Deze zullen pas worden getoond na de sluiting van de poll.',
                'length' => 'Maak peiling voor',
                'length_days_suffix' => 'dagen',
                'length_info' => 'Laat leeg voor een peiling die nooit eindigt',
                'max_options' => 'Opties per gebruiker',
                'max_options_info' => 'Dit is het aantal opties dat iedere gebruiker mag selecteren bij de stemming.',
                'options' => 'Opties',
                'options_info' => 'Plaats elke optie op een nieuwe lijn. Je mag maximaal 10 opties ingeven.',
                'title' => 'Vraag',
                'vote_change' => 'Sta opnieuw stemmen toe.',
                'vote_change_info' => 'Indien ingeschakeld, kunnen gebruikers hun stem wijzigen.',
            ],
        ],

        'edit_title' => [
            'start' => 'Bewerk titel',
        ],

        'index' => [
            'feature_votes' => 'ster prioriteit',
            'replies' => 'keer beantwoordt',
            'views' => 'keer bekeken',
        ],

        'issue_tag_added' => [
            'to_0' => 'Verwijder "toegevoegd" tag',
            'to_0_done' => 'Verwijderde "toegevoegd" tag',
            'to_1' => 'Voeg "toegevoegd" tag toe',
            'to_1_done' => 'Voegde "toegevoegd" tag toe',
        ],

        'issue_tag_assigned' => [
            'to_0' => 'Verwijder "toegewezen" tag',
            'to_0_done' => 'Verwijderde "toegewezen" tag',
            'to_1' => 'Voeg "toegewezen" tag toe',
            'to_1_done' => 'Voegde "toegewezen" tag toe',
        ],

        'issue_tag_confirmed' => [
            'to_0' => 'Verwijder "bevestigd" tag',
            'to_0_done' => 'Verwijderde "bevestigd" tag',
            'to_1' => 'Voeg "bevestigd" tag toe',
            'to_1_done' => 'Voegde "bevestigd" tag toe',
        ],

        'issue_tag_duplicate' => [
            'to_0' => 'Verwijder "duplicaat" tag',
            'to_0_done' => 'Verwijderde "duplicaat" tag',
            'to_1' => 'Voeg "duplicaat" tag toe',
            'to_1_done' => 'Voegde "duplicaat" tag toe',
        ],

        'issue_tag_invalid' => [
            'to_0' => 'Verwijder "invalide" tag',
            'to_0_done' => 'Verwijderde "invalide" tag',
            'to_1' => 'Voeg "invalide" tag toe',
            'to_1_done' => 'Voegde "invalide" tag toe',
        ],

        'issue_tag_resolved' => [
            'to_0' => 'Verwijder "opgelost" tag',
            'to_0_done' => 'Verwijderde "opgelost" tag',
            'to_1' => 'Voeg "opgelost" tag toe',
            'to_1_done' => 'Voegde "opgelost" tag toe',
        ],

        'issue_tag_osulazer' => [
            'to_0' => '',
            'to_0_done' => '',
            'to_1' => '',
            'to_1_done' => '',
        ],

        'issue_tag_osustable' => [
            'to_0' => '',
            'to_0_done' => '',
            'to_1' => '',
            'to_1_done' => '',
        ],

        'issue_tag_osuweb' => [
            'to_0' => '',
            'to_0_done' => '',
            'to_1' => '',
            'to_1_done' => '',
        ],

        'lock' => [
            'is_locked' => 'Dit onderwerp is gesloten en kan niet meer op beantwoord worden',
            'to_0' => 'Ontgrendel topic',
            'to_0_confirm' => 'Topic ontgrendelen?',
            'to_0_done' => 'Topic is ontgrendeld',
            'to_1' => 'Vergrendel topic',
            'to_1_confirm' => 'Topic vergrendelen?',
            'to_1_done' => 'Topic is vergrendeld',
        ],

        'moderate_move' => [
            'title' => 'Verplaats naar een ander forum',
        ],

        'moderate_pin' => [
            'to_0' => 'Onpin topic',
            'to_0_confirm' => 'Topic losmaken?',
            'to_0_done' => 'Topic niet meer gepint',
            'to_1' => 'Pin topic',
            'to_1_confirm' => 'Topic vastmaken?',
            'to_1_done' => 'Topic is gepint',
            'to_2' => 'Pin topic en markeer als melding',
            'to_2_confirm' => 'Topic vastmaken en markeer als aankondiging?',
            'to_2_done' => 'Topic is gepint en gemarkeerd als melding',
        ],

        'moderate_toggle_deleted' => [
            'show' => 'Toon verwijderde berichten',
            'hide' => 'Verberg verwijderde berichten',
        ],

        'show' => [
            'deleted-posts' => 'Verwijderde posts',
            'total_posts' => 'Alle posts',

            'feature_vote' => [
                'current' => 'Prioriteit: +:count',
                'do' => 'Promoot dit verzoek',

                'info' => [
                    '_' => 'Dit is een :feature_request. Feature requests kunnen omhoog worden gestemd door :supporters.',
                    'feature_request' => 'feature request',
                    'supporters' => 'supporters',
                ],

                'user' => [
                    'count' => '{0} geen stemmen|{1} :count stem|[2,*] :count stemmen',
                    'current' => 'Je hebt :votes stemmen over.',
                    'not_enough' => "Je hebt geen stemmen meer over",
                ],
            ],

            'poll' => [
                'edit' => 'Poll bewerken',
                'edit_warning' => 'Een poll bewerken zal de huidige resultaten verwijderen!',
                'vote' => 'Stem',

                'button' => [
                    'change_vote' => 'Verander je stem',
                    'edit' => 'Bewerk poll',
                    'view_results' => 'Ga naar resultaten',
                    'vote' => 'Stem',
                ],

                'detail' => [
                    'end_time' => 'Stemmen eindigt op :time',
                    'ended' => 'Stemming eindigde op :time',
                    'results_hidden' => 'Als de pollen zijn gesloten dan zullen resultaten worden getoond.',
                    'total' => 'Totale stemmen: count',
                ],
            ],
        ],

        'watch' => [
            'to_not_watching' => 'Heeft geen bladwijzer',
            'to_watching' => 'Voeg bladwijzer toe',
            'to_watching_mail' => 'Voeg bladwijzer met notificaties toe',
            'tooltip_mail_disable' => 'Melding is ingeschakeld. Klik om uit te schakelen',
            'tooltip_mail_enable' => 'Melding is uitgeschakeld. Klik om in te schakelen',
        ],
    ],
];
