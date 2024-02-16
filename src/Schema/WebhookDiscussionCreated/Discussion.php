<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\WebhookDiscussionCreated;

use ApiClients\Client\GitHubEnterprise\Schema;
use EventSauce\ObjectHydrator\MapFrom;

final readonly class Discussion
{
    public const SCHEMA_JSON         = '{
    "title": "Discussion",
    "required": [
        "repository_url",
        "category",
        "answer_html_url",
        "answer_chosen_at",
        "answer_chosen_by",
        "html_url",
        "id",
        "node_id",
        "number",
        "title",
        "user",
        "state",
        "locked",
        "comments",
        "created_at",
        "updated_at",
        "author_association",
        "active_lock_reason",
        "body"
    ],
    "type": "object",
    "properties": {
        "active_lock_reason": {
            "type": [
                "string",
                "null"
            ]
        },
        "answer_chosen_at": {
            "type": [
                "string",
                "null"
            ]
        },
        "answer_chosen_by": {
            "title": "User",
            "required": [
                "login",
                "id"
            ],
            "type": [
                "object",
                "null"
            ],
            "properties": {
                "avatar_url": {
                    "type": "string",
                    "format": "uri"
                },
                "deleted": {
                    "type": "boolean"
                },
                "email": {
                    "type": [
                        "string",
                        "null"
                    ]
                },
                "events_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "followers_url": {
                    "type": "string",
                    "format": "uri"
                },
                "following_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "gists_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "gravatar_id": {
                    "type": "string"
                },
                "html_url": {
                    "type": "string",
                    "format": "uri"
                },
                "id": {
                    "type": "integer"
                },
                "login": {
                    "type": "string"
                },
                "name": {
                    "type": "string"
                },
                "node_id": {
                    "type": "string"
                },
                "organizations_url": {
                    "type": "string",
                    "format": "uri"
                },
                "received_events_url": {
                    "type": "string",
                    "format": "uri"
                },
                "repos_url": {
                    "type": "string",
                    "format": "uri"
                },
                "site_admin": {
                    "type": "boolean"
                },
                "starred_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "subscriptions_url": {
                    "type": "string",
                    "format": "uri"
                },
                "type": {
                    "enum": [
                        "Bot",
                        "User",
                        "Organization"
                    ],
                    "type": "string"
                },
                "url": {
                    "type": "string",
                    "format": "uri"
                }
            }
        },
        "answer_html_url": {
            "type": [
                "string",
                "null"
            ]
        },
        "author_association": {
            "title": "AuthorAssociation",
            "enum": [
                "COLLABORATOR",
                "CONTRIBUTOR",
                "FIRST_TIMER",
                "FIRST_TIME_CONTRIBUTOR",
                "MANNEQUIN",
                "MEMBER",
                "NONE",
                "OWNER"
            ],
            "type": "string",
            "description": "How the author is associated with the repository."
        },
        "body": {
            "type": [
                "string",
                "null"
            ]
        },
        "category": {
            "required": [
                "id",
                "repository_id",
                "emoji",
                "name",
                "description",
                "created_at",
                "updated_at",
                "slug",
                "is_answerable"
            ],
            "type": "object",
            "properties": {
                "created_at": {
                    "type": "string",
                    "format": "date-time"
                },
                "description": {
                    "type": "string"
                },
                "emoji": {
                    "type": "string"
                },
                "id": {
                    "type": "integer"
                },
                "is_answerable": {
                    "type": "boolean"
                },
                "name": {
                    "type": "string"
                },
                "node_id": {
                    "type": "string"
                },
                "repository_id": {
                    "type": "integer"
                },
                "slug": {
                    "type": "string"
                },
                "updated_at": {
                    "type": "string"
                }
            }
        },
        "comments": {
            "type": "integer"
        },
        "created_at": {
            "type": "string",
            "format": "date-time"
        },
        "html_url": {
            "type": "string"
        },
        "id": {
            "type": "integer"
        },
        "locked": {
            "type": "boolean"
        },
        "node_id": {
            "type": "string"
        },
        "number": {
            "type": "integer"
        },
        "reactions": {
            "title": "Reactions",
            "required": [
                "url",
                "total_count",
                "+1",
                "-1",
                "laugh",
                "confused",
                "heart",
                "hooray",
                "eyes",
                "rocket"
            ],
            "type": "object",
            "properties": {
                "+1": {
                    "type": "integer"
                },
                "-1": {
                    "type": "integer"
                },
                "confused": {
                    "type": "integer"
                },
                "eyes": {
                    "type": "integer"
                },
                "heart": {
                    "type": "integer"
                },
                "hooray": {
                    "type": "integer"
                },
                "laugh": {
                    "type": "integer"
                },
                "rocket": {
                    "type": "integer"
                },
                "total_count": {
                    "type": "integer"
                },
                "url": {
                    "type": "string",
                    "format": "uri"
                }
            }
        },
        "repository_url": {
            "type": "string"
        },
        "state": {
            "enum": [
                "open",
                "locked",
                "converting",
                "transferring"
            ],
            "type": "string"
        },
        "timeline_url": {
            "type": "string"
        },
        "title": {
            "type": "string"
        },
        "updated_at": {
            "type": "string",
            "format": "date-time"
        },
        "user": {
            "title": "User",
            "required": [
                "login",
                "id"
            ],
            "type": [
                "object",
                "null"
            ],
            "properties": {
                "avatar_url": {
                    "type": "string",
                    "format": "uri"
                },
                "deleted": {
                    "type": "boolean"
                },
                "email": {
                    "type": [
                        "string",
                        "null"
                    ]
                },
                "events_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "followers_url": {
                    "type": "string",
                    "format": "uri"
                },
                "following_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "gists_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "gravatar_id": {
                    "type": "string"
                },
                "html_url": {
                    "type": "string",
                    "format": "uri"
                },
                "id": {
                    "type": "integer"
                },
                "login": {
                    "type": "string"
                },
                "name": {
                    "type": "string"
                },
                "node_id": {
                    "type": "string"
                },
                "organizations_url": {
                    "type": "string",
                    "format": "uri"
                },
                "received_events_url": {
                    "type": "string",
                    "format": "uri"
                },
                "repos_url": {
                    "type": "string",
                    "format": "uri"
                },
                "site_admin": {
                    "type": "boolean"
                },
                "starred_url": {
                    "type": "string",
                    "format": "uri-template"
                },
                "subscriptions_url": {
                    "type": "string",
                    "format": "uri"
                },
                "type": {
                    "enum": [
                        "Bot",
                        "User",
                        "Organization"
                    ],
                    "type": "string"
                },
                "url": {
                    "type": "string",
                    "format": "uri"
                }
            }
        }
    }
}';
    public const SCHEMA_TITLE        = 'Discussion';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{
    "active_lock_reason": "generated",
    "answer_chosen_at": "generated",
    "answer_chosen_by": {
        "avatar_url": "https:\\/\\/example.com\\/",
        "deleted": false,
        "email": "generated",
        "events_url": "generated",
        "followers_url": "https:\\/\\/example.com\\/",
        "following_url": "generated",
        "gists_url": "generated",
        "gravatar_id": "generated",
        "html_url": "https:\\/\\/example.com\\/",
        "id": 2,
        "login": "generated",
        "name": "generated",
        "node_id": "generated",
        "organizations_url": "https:\\/\\/example.com\\/",
        "received_events_url": "https:\\/\\/example.com\\/",
        "repos_url": "https:\\/\\/example.com\\/",
        "site_admin": false,
        "starred_url": "generated",
        "subscriptions_url": "https:\\/\\/example.com\\/",
        "type": "Organization",
        "url": "https:\\/\\/example.com\\/"
    },
    "answer_html_url": "generated",
    "author_association": "OWNER",
    "body": "generated",
    "category": {
        "created_at": "1970-01-01T00:00:00+00:00",
        "description": "generated",
        "emoji": "generated",
        "id": 2,
        "is_answerable": false,
        "name": "generated",
        "node_id": "generated",
        "repository_id": 13,
        "slug": "generated",
        "updated_at": "generated"
    },
    "comments": 8,
    "created_at": "1970-01-01T00:00:00+00:00",
    "html_url": "generated",
    "id": 2,
    "locked": false,
    "node_id": "generated",
    "number": 6,
    "reactions": {
        "+1": 11,
        "-1": 10,
        "confused": 8,
        "eyes": 4,
        "heart": 5,
        "hooray": 6,
        "laugh": 5,
        "rocket": 6,
        "total_count": 11,
        "url": "https:\\/\\/example.com\\/"
    },
    "repository_url": "generated",
    "state": "open",
    "timeline_url": "generated",
    "title": "generated",
    "updated_at": "1970-01-01T00:00:00+00:00",
    "user": {
        "avatar_url": "https:\\/\\/example.com\\/",
        "deleted": false,
        "email": "generated",
        "events_url": "generated",
        "followers_url": "https:\\/\\/example.com\\/",
        "following_url": "generated",
        "gists_url": "generated",
        "gravatar_id": "generated",
        "html_url": "https:\\/\\/example.com\\/",
        "id": 2,
        "login": "generated",
        "name": "generated",
        "node_id": "generated",
        "organizations_url": "https:\\/\\/example.com\\/",
        "received_events_url": "https:\\/\\/example.com\\/",
        "repos_url": "https:\\/\\/example.com\\/",
        "site_admin": false,
        "starred_url": "generated",
        "subscriptions_url": "https:\\/\\/example.com\\/",
        "type": "Organization",
        "url": "https:\\/\\/example.com\\/"
    }
}';

    /**
     * authorAssociation: How the author is associated with the repository.
     */
    public function __construct(#[MapFrom('active_lock_reason')]
    public string|null $activeLockReason, #[MapFrom('answer_chosen_at')]
    public string|null $answerChosenAt, #[MapFrom('answer_chosen_by')]
    public Schema\WebhookDiscussionCreated\Discussion\AnswerChosenBy|null $answerChosenBy, #[MapFrom('answer_html_url')]
    public string|null $answerHtmlUrl, #[MapFrom('author_association')]
    public string $authorAssociation, public string|null $body, public Schema\WebhookDiscussionCreated\Discussion\Category $category, public int $comments, #[MapFrom('created_at')]
    public string $createdAt, #[MapFrom('html_url')]
    public string $htmlUrl, public int $id, public bool $locked, #[MapFrom('node_id')]
    public string $nodeId, public int $number, public Schema\WebhookDiscussionCreated\Discussion\Reactions|null $reactions, #[MapFrom('repository_url')]
    public string $repositoryUrl, public string $state, #[MapFrom('timeline_url')]
    public string|null $timelineUrl, public string $title, #[MapFrom('updated_at')]
    public string $updatedAt, public Schema\WebhookDiscussionCreated\Discussion\User|null $user,)
    {
    }
}
