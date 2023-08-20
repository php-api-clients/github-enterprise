<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\AliasAbstract\TietFD5D65C1\Tiet0FBD94A3\Tiet72E5C7FF;

use EventSauce\ObjectHydrator\MapFrom;

abstract readonly class Tiet2E753155
{
    public const SCHEMA_JSON         = '{
    "required": [
        "total_count",
        "workflow_runs"
    ],
    "type": "object",
    "properties": {
        "total_count": {
            "type": "integer"
        },
        "workflow_runs": {
            "type": "array",
            "items": {
                "title": "Workflow Run",
                "required": [
                    "id",
                    "node_id",
                    "head_branch",
                    "run_number",
                    "display_title",
                    "event",
                    "status",
                    "conclusion",
                    "head_sha",
                    "path",
                    "workflow_id",
                    "url",
                    "html_url",
                    "created_at",
                    "updated_at",
                    "head_commit",
                    "head_repository",
                    "repository",
                    "jobs_url",
                    "logs_url",
                    "check_suite_url",
                    "cancel_url",
                    "rerun_url",
                    "artifacts_url",
                    "workflow_url",
                    "pull_requests"
                ],
                "type": "object",
                "properties": {
                    "id": {
                        "type": "integer",
                        "description": "The ID of the workflow run.",
                        "examples": [
                            5
                        ]
                    },
                    "name": {
                        "type": [
                            "string",
                            "null"
                        ],
                        "description": "The name of the workflow run.",
                        "examples": [
                            "Build"
                        ]
                    },
                    "node_id": {
                        "type": "string",
                        "examples": [
                            "MDEwOkNoZWNrU3VpdGU1"
                        ]
                    },
                    "check_suite_id": {
                        "type": "integer",
                        "description": "The ID of the associated check suite.",
                        "examples": [
                            42
                        ]
                    },
                    "check_suite_node_id": {
                        "type": "string",
                        "description": "The node ID of the associated check suite.",
                        "examples": [
                            "MDEwOkNoZWNrU3VpdGU0Mg=="
                        ]
                    },
                    "head_branch": {
                        "type": [
                            "string",
                            "null"
                        ],
                        "examples": [
                            "master"
                        ]
                    },
                    "head_sha": {
                        "type": "string",
                        "description": "The SHA of the head commit that points to the version of the workflow being run.",
                        "examples": [
                            "009b8a3a9ccbb128af87f9b1c0f4c62e8a304f6d"
                        ]
                    },
                    "path": {
                        "type": "string",
                        "description": "The full path of the workflow",
                        "examples": [
                            "octocat\\/octo-repo\\/.github\\/workflows\\/ci.yml@main"
                        ]
                    },
                    "run_number": {
                        "type": "integer",
                        "description": "The auto incrementing run number for the workflow run.",
                        "examples": [
                            106
                        ]
                    },
                    "run_attempt": {
                        "type": "integer",
                        "description": "Attempt number of the run, 1 for first attempt and higher if the workflow was re-run.",
                        "examples": [
                            1
                        ]
                    },
                    "referenced_workflows": {
                        "type": [
                            "array",
                            "null"
                        ],
                        "items": {
                            "title": "Referenced workflow",
                            "required": [
                                "path",
                                "sha"
                            ],
                            "type": "object",
                            "properties": {
                                "path": {
                                    "type": "string"
                                },
                                "sha": {
                                    "type": "string"
                                },
                                "ref": {
                                    "type": "string"
                                }
                            },
                            "description": "A workflow referenced\\/reused by the initial caller workflow"
                        }
                    },
                    "event": {
                        "type": "string",
                        "examples": [
                            "push"
                        ]
                    },
                    "status": {
                        "type": [
                            "string",
                            "null"
                        ],
                        "examples": [
                            "completed"
                        ]
                    },
                    "conclusion": {
                        "type": [
                            "string",
                            "null"
                        ],
                        "examples": [
                            "neutral"
                        ]
                    },
                    "workflow_id": {
                        "type": "integer",
                        "description": "The ID of the parent workflow.",
                        "examples": [
                            5
                        ]
                    },
                    "url": {
                        "type": "string",
                        "description": "The URL to the workflow run.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5"
                        ]
                    },
                    "html_url": {
                        "type": "string",
                        "examples": [
                            "https:\\/\\/github.com\\/github\\/hello-world\\/suites\\/4"
                        ]
                    },
                    "pull_requests": {
                        "type": [
                            "array",
                            "null"
                        ],
                        "items": {
                            "title": "Pull Request Minimal",
                            "required": [
                                "id",
                                "number",
                                "url",
                                "head",
                                "base"
                            ],
                            "type": "object",
                            "properties": {
                                "id": {
                                    "type": "integer"
                                },
                                "number": {
                                    "type": "integer"
                                },
                                "url": {
                                    "type": "string"
                                },
                                "head": {
                                    "required": [
                                        "ref",
                                        "sha",
                                        "repo"
                                    ],
                                    "type": "object",
                                    "properties": {
                                        "ref": {
                                            "type": "string"
                                        },
                                        "sha": {
                                            "type": "string"
                                        },
                                        "repo": {
                                            "required": [
                                                "id",
                                                "url",
                                                "name"
                                            ],
                                            "type": "object",
                                            "properties": {
                                                "id": {
                                                    "type": "integer"
                                                },
                                                "url": {
                                                    "type": "string"
                                                },
                                                "name": {
                                                    "type": "string"
                                                }
                                            }
                                        }
                                    }
                                },
                                "base": {
                                    "required": [
                                        "ref",
                                        "sha",
                                        "repo"
                                    ],
                                    "type": "object",
                                    "properties": {
                                        "ref": {
                                            "type": "string"
                                        },
                                        "sha": {
                                            "type": "string"
                                        },
                                        "repo": {
                                            "required": [
                                                "id",
                                                "url",
                                                "name"
                                            ],
                                            "type": "object",
                                            "properties": {
                                                "id": {
                                                    "type": "integer"
                                                },
                                                "url": {
                                                    "type": "string"
                                                },
                                                "name": {
                                                    "type": "string"
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        "description": "Pull requests that are open with a `head_sha` or `head_branch` that matches the workflow run. The returned pull requests do not necessarily indicate pull requests that triggered the run."
                    },
                    "created_at": {
                        "type": "string",
                        "format": "date-time"
                    },
                    "updated_at": {
                        "type": "string",
                        "format": "date-time"
                    },
                    "actor": {
                        "title": "Simple User",
                        "required": [
                            "avatar_url",
                            "events_url",
                            "followers_url",
                            "following_url",
                            "gists_url",
                            "gravatar_id",
                            "html_url",
                            "id",
                            "node_id",
                            "login",
                            "organizations_url",
                            "received_events_url",
                            "repos_url",
                            "site_admin",
                            "starred_url",
                            "subscriptions_url",
                            "type",
                            "url"
                        ],
                        "type": "object",
                        "properties": {
                            "name": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "email": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "login": {
                                "type": "string",
                                "examples": [
                                    "octocat"
                                ]
                            },
                            "id": {
                                "type": "integer",
                                "examples": [
                                    1
                                ]
                            },
                            "node_id": {
                                "type": "string",
                                "examples": [
                                    "MDQ6VXNlcjE="
                                ]
                            },
                            "avatar_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif"
                                ]
                            },
                            "gravatar_id": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "examples": [
                                    "41d064eb2195891e12d0413f63227ea7"
                                ]
                            },
                            "url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat"
                                ]
                            },
                            "html_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/github.com\\/octocat"
                                ]
                            },
                            "followers_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/followers"
                                ]
                            },
                            "following_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}"
                                ]
                            },
                            "gists_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}"
                                ]
                            },
                            "starred_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}"
                                ]
                            },
                            "subscriptions_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions"
                                ]
                            },
                            "organizations_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs"
                                ]
                            },
                            "repos_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/repos"
                                ]
                            },
                            "events_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}"
                                ]
                            },
                            "received_events_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events"
                                ]
                            },
                            "type": {
                                "type": "string",
                                "examples": [
                                    "User"
                                ]
                            },
                            "site_admin": {
                                "type": "boolean"
                            },
                            "starred_at": {
                                "type": "string",
                                "examples": [
                                    "\\"2020-07-09T00:17:55Z\\""
                                ]
                            }
                        },
                        "description": "A GitHub user."
                    },
                    "triggering_actor": {
                        "title": "Simple User",
                        "required": [
                            "avatar_url",
                            "events_url",
                            "followers_url",
                            "following_url",
                            "gists_url",
                            "gravatar_id",
                            "html_url",
                            "id",
                            "node_id",
                            "login",
                            "organizations_url",
                            "received_events_url",
                            "repos_url",
                            "site_admin",
                            "starred_url",
                            "subscriptions_url",
                            "type",
                            "url"
                        ],
                        "type": "object",
                        "properties": {
                            "name": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "email": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "login": {
                                "type": "string",
                                "examples": [
                                    "octocat"
                                ]
                            },
                            "id": {
                                "type": "integer",
                                "examples": [
                                    1
                                ]
                            },
                            "node_id": {
                                "type": "string",
                                "examples": [
                                    "MDQ6VXNlcjE="
                                ]
                            },
                            "avatar_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif"
                                ]
                            },
                            "gravatar_id": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "examples": [
                                    "41d064eb2195891e12d0413f63227ea7"
                                ]
                            },
                            "url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat"
                                ]
                            },
                            "html_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/github.com\\/octocat"
                                ]
                            },
                            "followers_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/followers"
                                ]
                            },
                            "following_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}"
                                ]
                            },
                            "gists_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}"
                                ]
                            },
                            "starred_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}"
                                ]
                            },
                            "subscriptions_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions"
                                ]
                            },
                            "organizations_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs"
                                ]
                            },
                            "repos_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/repos"
                                ]
                            },
                            "events_url": {
                                "type": "string",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}"
                                ]
                            },
                            "received_events_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events"
                                ]
                            },
                            "type": {
                                "type": "string",
                                "examples": [
                                    "User"
                                ]
                            },
                            "site_admin": {
                                "type": "boolean"
                            },
                            "starred_at": {
                                "type": "string",
                                "examples": [
                                    "\\"2020-07-09T00:17:55Z\\""
                                ]
                            }
                        },
                        "description": "A GitHub user."
                    },
                    "run_started_at": {
                        "type": "string",
                        "description": "The start time of the latest run. Resets on re-run.",
                        "format": "date-time"
                    },
                    "jobs_url": {
                        "type": "string",
                        "description": "The URL to the jobs for the workflow run.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/jobs"
                        ]
                    },
                    "logs_url": {
                        "type": "string",
                        "description": "The URL to download the logs for the workflow run.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/logs"
                        ]
                    },
                    "check_suite_url": {
                        "type": "string",
                        "description": "The URL to the associated check suite.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/check-suites\\/12"
                        ]
                    },
                    "artifacts_url": {
                        "type": "string",
                        "description": "The URL to the artifacts for the workflow run.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/rerun\\/artifacts"
                        ]
                    },
                    "cancel_url": {
                        "type": "string",
                        "description": "The URL to cancel the workflow run.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/cancel"
                        ]
                    },
                    "rerun_url": {
                        "type": "string",
                        "description": "The URL to rerun the workflow run.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/rerun"
                        ]
                    },
                    "previous_attempt_url": {
                        "type": [
                            "string",
                            "null"
                        ],
                        "description": "The URL to the previous attempted run of this workflow, if one exists.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/attempts\\/3"
                        ]
                    },
                    "workflow_url": {
                        "type": "string",
                        "description": "The URL to the workflow.",
                        "examples": [
                            "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/workflows\\/main.yaml"
                        ]
                    },
                    "head_commit": {
                        "anyOf": [
                            {
                                "type": "null"
                            },
                            {
                                "title": "Simple Commit",
                                "required": [
                                    "id",
                                    "tree_id",
                                    "message",
                                    "timestamp",
                                    "author",
                                    "committer"
                                ],
                                "type": "object",
                                "properties": {
                                    "id": {
                                        "type": "string",
                                        "description": "SHA for the commit",
                                        "examples": [
                                            "7638417db6d59f3c431d3e1f261cc637155684cd"
                                        ]
                                    },
                                    "tree_id": {
                                        "type": "string",
                                        "description": "SHA for the commit\'s tree"
                                    },
                                    "message": {
                                        "type": "string",
                                        "description": "Message describing the purpose of the commit",
                                        "examples": [
                                            "Fix #42"
                                        ]
                                    },
                                    "timestamp": {
                                        "type": "string",
                                        "description": "Timestamp of the commit",
                                        "format": "date-time",
                                        "examples": [
                                            "2014-08-09T08:02:04+12:00"
                                        ]
                                    },
                                    "author": {
                                        "required": [
                                            "name",
                                            "email"
                                        ],
                                        "type": [
                                            "object",
                                            "null"
                                        ],
                                        "properties": {
                                            "name": {
                                                "type": "string",
                                                "description": "Name of the commit\'s author",
                                                "examples": [
                                                    "Monalisa Octocat"
                                                ]
                                            },
                                            "email": {
                                                "type": "string",
                                                "description": "Git email address of the commit\'s author",
                                                "format": "email",
                                                "examples": [
                                                    "monalisa.octocat@example.com"
                                                ]
                                            }
                                        },
                                        "description": "Information about the Git author"
                                    },
                                    "committer": {
                                        "required": [
                                            "name",
                                            "email"
                                        ],
                                        "type": [
                                            "object",
                                            "null"
                                        ],
                                        "properties": {
                                            "name": {
                                                "type": "string",
                                                "description": "Name of the commit\'s committer",
                                                "examples": [
                                                    "Monalisa Octocat"
                                                ]
                                            },
                                            "email": {
                                                "type": "string",
                                                "description": "Git email address of the commit\'s committer",
                                                "format": "email",
                                                "examples": [
                                                    "monalisa.octocat@example.com"
                                                ]
                                            }
                                        },
                                        "description": "Information about the Git committer"
                                    }
                                },
                                "description": "A commit."
                            }
                        ]
                    },
                    "repository": {
                        "title": "Minimal Repository",
                        "required": [
                            "archive_url",
                            "assignees_url",
                            "blobs_url",
                            "branches_url",
                            "collaborators_url",
                            "comments_url",
                            "commits_url",
                            "compare_url",
                            "contents_url",
                            "contributors_url",
                            "deployments_url",
                            "description",
                            "downloads_url",
                            "events_url",
                            "fork",
                            "forks_url",
                            "full_name",
                            "git_commits_url",
                            "git_refs_url",
                            "git_tags_url",
                            "hooks_url",
                            "html_url",
                            "id",
                            "node_id",
                            "issue_comment_url",
                            "issue_events_url",
                            "issues_url",
                            "keys_url",
                            "labels_url",
                            "languages_url",
                            "merges_url",
                            "milestones_url",
                            "name",
                            "notifications_url",
                            "owner",
                            "private",
                            "pulls_url",
                            "releases_url",
                            "stargazers_url",
                            "statuses_url",
                            "subscribers_url",
                            "subscription_url",
                            "tags_url",
                            "teams_url",
                            "trees_url",
                            "url"
                        ],
                        "type": "object",
                        "properties": {
                            "id": {
                                "type": "integer",
                                "examples": [
                                    1296269
                                ]
                            },
                            "node_id": {
                                "type": "string",
                                "examples": [
                                    "MDEwOlJlcG9zaXRvcnkxMjk2MjY5"
                                ]
                            },
                            "name": {
                                "type": "string",
                                "examples": [
                                    "Hello-World"
                                ]
                            },
                            "full_name": {
                                "type": "string",
                                "examples": [
                                    "octocat\\/Hello-World"
                                ]
                            },
                            "owner": {
                                "title": "Simple User",
                                "required": [
                                    "avatar_url",
                                    "events_url",
                                    "followers_url",
                                    "following_url",
                                    "gists_url",
                                    "gravatar_id",
                                    "html_url",
                                    "id",
                                    "node_id",
                                    "login",
                                    "organizations_url",
                                    "received_events_url",
                                    "repos_url",
                                    "site_admin",
                                    "starred_url",
                                    "subscriptions_url",
                                    "type",
                                    "url"
                                ],
                                "type": "object",
                                "properties": {
                                    "name": {
                                        "type": [
                                            "string",
                                            "null"
                                        ]
                                    },
                                    "email": {
                                        "type": [
                                            "string",
                                            "null"
                                        ]
                                    },
                                    "login": {
                                        "type": "string",
                                        "examples": [
                                            "octocat"
                                        ]
                                    },
                                    "id": {
                                        "type": "integer",
                                        "examples": [
                                            1
                                        ]
                                    },
                                    "node_id": {
                                        "type": "string",
                                        "examples": [
                                            "MDQ6VXNlcjE="
                                        ]
                                    },
                                    "avatar_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif"
                                        ]
                                    },
                                    "gravatar_id": {
                                        "type": [
                                            "string",
                                            "null"
                                        ],
                                        "examples": [
                                            "41d064eb2195891e12d0413f63227ea7"
                                        ]
                                    },
                                    "url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat"
                                        ]
                                    },
                                    "html_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/github.com\\/octocat"
                                        ]
                                    },
                                    "followers_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/followers"
                                        ]
                                    },
                                    "following_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}"
                                        ]
                                    },
                                    "gists_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}"
                                        ]
                                    },
                                    "starred_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}"
                                        ]
                                    },
                                    "subscriptions_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions"
                                        ]
                                    },
                                    "organizations_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs"
                                        ]
                                    },
                                    "repos_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/repos"
                                        ]
                                    },
                                    "events_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}"
                                        ]
                                    },
                                    "received_events_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events"
                                        ]
                                    },
                                    "type": {
                                        "type": "string",
                                        "examples": [
                                            "User"
                                        ]
                                    },
                                    "site_admin": {
                                        "type": "boolean"
                                    },
                                    "starred_at": {
                                        "type": "string",
                                        "examples": [
                                            "\\"2020-07-09T00:17:55Z\\""
                                        ]
                                    }
                                },
                                "description": "A GitHub user."
                            },
                            "private": {
                                "type": "boolean"
                            },
                            "html_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/github.com\\/octocat\\/Hello-World"
                                ]
                            },
                            "description": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "examples": [
                                    "This your first repo!"
                                ]
                            },
                            "fork": {
                                "type": "boolean"
                            },
                            "url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World"
                                ]
                            },
                            "archive_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/{archive_format}{\\/ref}"
                                ]
                            },
                            "assignees_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/assignees{\\/user}"
                                ]
                            },
                            "blobs_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/blobs{\\/sha}"
                                ]
                            },
                            "branches_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/branches{\\/branch}"
                                ]
                            },
                            "collaborators_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/collaborators{\\/collaborator}"
                                ]
                            },
                            "comments_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/comments{\\/number}"
                                ]
                            },
                            "commits_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/commits{\\/sha}"
                                ]
                            },
                            "compare_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/compare\\/{base}...{head}"
                                ]
                            },
                            "contents_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contents\\/{+path}"
                                ]
                            },
                            "contributors_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contributors"
                                ]
                            },
                            "deployments_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/deployments"
                                ]
                            },
                            "downloads_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/downloads"
                                ]
                            },
                            "events_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/events"
                                ]
                            },
                            "forks_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/forks"
                                ]
                            },
                            "git_commits_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/commits{\\/sha}"
                                ]
                            },
                            "git_refs_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/refs{\\/sha}"
                                ]
                            },
                            "git_tags_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/tags{\\/sha}"
                                ]
                            },
                            "git_url": {
                                "type": "string"
                            },
                            "issue_comment_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments{\\/number}"
                                ]
                            },
                            "issue_events_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/events{\\/number}"
                                ]
                            },
                            "issues_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues{\\/number}"
                                ]
                            },
                            "keys_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/keys{\\/key_id}"
                                ]
                            },
                            "labels_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/labels{\\/name}"
                                ]
                            },
                            "languages_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/languages"
                                ]
                            },
                            "merges_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/merges"
                                ]
                            },
                            "milestones_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/milestones{\\/number}"
                                ]
                            },
                            "notifications_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/notifications{?since,all,participating}"
                                ]
                            },
                            "pulls_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/pulls{\\/number}"
                                ]
                            },
                            "releases_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/releases{\\/id}"
                                ]
                            },
                            "ssh_url": {
                                "type": "string"
                            },
                            "stargazers_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/stargazers"
                                ]
                            },
                            "statuses_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/statuses\\/{sha}"
                                ]
                            },
                            "subscribers_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscribers"
                                ]
                            },
                            "subscription_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscription"
                                ]
                            },
                            "tags_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/tags"
                                ]
                            },
                            "teams_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/teams"
                                ]
                            },
                            "trees_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/trees{\\/sha}"
                                ]
                            },
                            "clone_url": {
                                "type": "string"
                            },
                            "mirror_url": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "hooks_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/hooks"
                                ]
                            },
                            "svn_url": {
                                "type": "string"
                            },
                            "homepage": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "language": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "forks_count": {
                                "type": "integer"
                            },
                            "stargazers_count": {
                                "type": "integer"
                            },
                            "watchers_count": {
                                "type": "integer"
                            },
                            "size": {
                                "type": "integer",
                                "description": "The size of the repository. Size is calculated hourly. When a repository is initially created, the size is 0."
                            },
                            "default_branch": {
                                "type": "string"
                            },
                            "open_issues_count": {
                                "type": "integer"
                            },
                            "is_template": {
                                "type": "boolean"
                            },
                            "topics": {
                                "type": "array",
                                "items": {
                                    "type": "string"
                                }
                            },
                            "has_issues": {
                                "type": "boolean"
                            },
                            "has_projects": {
                                "type": "boolean"
                            },
                            "has_wiki": {
                                "type": "boolean"
                            },
                            "has_pages": {
                                "type": "boolean"
                            },
                            "has_downloads": {
                                "type": "boolean"
                            },
                            "has_discussions": {
                                "type": "boolean"
                            },
                            "archived": {
                                "type": "boolean"
                            },
                            "disabled": {
                                "type": "boolean"
                            },
                            "visibility": {
                                "type": "string"
                            },
                            "pushed_at": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "format": "date-time",
                                "examples": [
                                    "2011-01-26T19:06:43Z"
                                ]
                            },
                            "created_at": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "format": "date-time",
                                "examples": [
                                    "2011-01-26T19:01:12Z"
                                ]
                            },
                            "updated_at": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "format": "date-time",
                                "examples": [
                                    "2011-01-26T19:14:43Z"
                                ]
                            },
                            "permissions": {
                                "type": "object",
                                "properties": {
                                    "admin": {
                                        "type": "boolean"
                                    },
                                    "maintain": {
                                        "type": "boolean"
                                    },
                                    "push": {
                                        "type": "boolean"
                                    },
                                    "triage": {
                                        "type": "boolean"
                                    },
                                    "pull": {
                                        "type": "boolean"
                                    }
                                }
                            },
                            "role_name": {
                                "type": "string",
                                "examples": [
                                    "admin"
                                ]
                            },
                            "temp_clone_token": {
                                "type": "string"
                            },
                            "delete_branch_on_merge": {
                                "type": "boolean"
                            },
                            "subscribers_count": {
                                "type": "integer"
                            },
                            "network_count": {
                                "type": "integer"
                            },
                            "code_of_conduct": {
                                "title": "Code Of Conduct",
                                "required": [
                                    "url",
                                    "html_url",
                                    "key",
                                    "name"
                                ],
                                "type": "object",
                                "properties": {
                                    "key": {
                                        "type": "string",
                                        "examples": [
                                            "contributor_covenant"
                                        ]
                                    },
                                    "name": {
                                        "type": "string",
                                        "examples": [
                                            "Contributor Covenant"
                                        ]
                                    },
                                    "url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/codes_of_conduct\\/contributor_covenant"
                                        ]
                                    },
                                    "body": {
                                        "type": "string",
                                        "examples": [
                                            "# Contributor Covenant Code of Conduct\\n\\n## Our Pledge\\n\\nIn the interest of fostering an open and welcoming environment, we as contributors and maintainers pledge to making participation in our project and our community a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.\\n\\n## Our Standards\\n\\nExamples of behavior that contributes to creating a positive environment include:\\n\\n* Using welcoming and inclusive language\\n* Being respectful of differing viewpoints and experiences\\n* Gracefully accepting constructive criticism\\n* Focusing on what is best for the community\\n* Showing empathy towards other community members\\n\\nExamples of unacceptable behavior by participants include:\\n\\n* The use of sexualized language or imagery and unwelcome sexual attention or advances\\n* Trolling, insulting\\/derogatory comments, and personal or political attacks\\n* Public or private harassment\\n* Publishing others\' private information, such as a physical or electronic address, without explicit permission\\n* Other conduct which could reasonably be considered inappropriate in a professional setting\\n\\n## Our Responsibilities\\n\\nProject maintainers are responsible for clarifying the standards of acceptable behavior and are expected to take appropriate and fair corrective action in response\\n                  to any instances of unacceptable behavior.\\n\\nProject maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct, or to ban temporarily or permanently any contributor for other behaviors that they deem inappropriate, threatening, offensive, or harmful.\\n\\n## Scope\\n\\nThis Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Examples of representing a project or community include using an official project e-mail address,\\n                  posting via an official social media account, or acting as an appointed representative at an online or offline event. Representation of a project may be further defined and clarified by project maintainers.\\n\\n## Enforcement\\n\\nInstances of abusive, harassing, or otherwise unacceptable behavior may be reported by contacting the project team at [EMAIL]. The project team will review and investigate all complaints, and will respond in a way that it deems appropriate to the circumstances. The project team is obligated to maintain confidentiality with regard to the reporter of an incident. Further details of specific enforcement policies may be posted separately.\\n\\nProject maintainers who do not follow or enforce the Code of Conduct in good faith may face temporary or permanent repercussions as determined by other members of the project\'s leadership.\\n\\n## Attribution\\n\\nThis Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4, available at [http:\\/\\/contributor-covenant.org\\/version\\/1\\/4][version]\\n\\n[homepage]: http:\\/\\/contributor-covenant.org\\n[version]: http:\\/\\/contributor-covenant.org\\/version\\/1\\/4\\/\\n"
                                        ]
                                    },
                                    "html_url": {
                                        "type": [
                                            "string",
                                            "null"
                                        ],
                                        "format": "uri"
                                    }
                                },
                                "description": "Code Of Conduct"
                            },
                            "license": {
                                "type": [
                                    "object",
                                    "null"
                                ],
                                "properties": {
                                    "key": {
                                        "type": "string"
                                    },
                                    "name": {
                                        "type": "string"
                                    },
                                    "spdx_id": {
                                        "type": "string"
                                    },
                                    "url": {
                                        "type": "string"
                                    },
                                    "node_id": {
                                        "type": "string"
                                    }
                                }
                            },
                            "forks": {
                                "type": "integer",
                                "examples": [
                                    0
                                ]
                            },
                            "open_issues": {
                                "type": "integer",
                                "examples": [
                                    0
                                ]
                            },
                            "watchers": {
                                "type": "integer",
                                "examples": [
                                    0
                                ]
                            },
                            "allow_forking": {
                                "type": "boolean"
                            },
                            "web_commit_signoff_required": {
                                "type": "boolean",
                                "examples": [
                                    false
                                ]
                            },
                            "security_and_analysis": {
                                "type": [
                                    "object",
                                    "null"
                                ],
                                "properties": {
                                    "advanced_security": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string"
                                            }
                                        }
                                    },
                                    "dependabot_security_updates": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string",
                                                "description": "The enablement status of Dependabot security updates for the repository."
                                            }
                                        },
                                        "description": "Enable or disable Dependabot security updates for the repository."
                                    },
                                    "secret_scanning": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string"
                                            }
                                        }
                                    },
                                    "secret_scanning_push_protection": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string"
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        "description": "Minimal Repository"
                    },
                    "head_repository": {
                        "title": "Minimal Repository",
                        "required": [
                            "archive_url",
                            "assignees_url",
                            "blobs_url",
                            "branches_url",
                            "collaborators_url",
                            "comments_url",
                            "commits_url",
                            "compare_url",
                            "contents_url",
                            "contributors_url",
                            "deployments_url",
                            "description",
                            "downloads_url",
                            "events_url",
                            "fork",
                            "forks_url",
                            "full_name",
                            "git_commits_url",
                            "git_refs_url",
                            "git_tags_url",
                            "hooks_url",
                            "html_url",
                            "id",
                            "node_id",
                            "issue_comment_url",
                            "issue_events_url",
                            "issues_url",
                            "keys_url",
                            "labels_url",
                            "languages_url",
                            "merges_url",
                            "milestones_url",
                            "name",
                            "notifications_url",
                            "owner",
                            "private",
                            "pulls_url",
                            "releases_url",
                            "stargazers_url",
                            "statuses_url",
                            "subscribers_url",
                            "subscription_url",
                            "tags_url",
                            "teams_url",
                            "trees_url",
                            "url"
                        ],
                        "type": "object",
                        "properties": {
                            "id": {
                                "type": "integer",
                                "examples": [
                                    1296269
                                ]
                            },
                            "node_id": {
                                "type": "string",
                                "examples": [
                                    "MDEwOlJlcG9zaXRvcnkxMjk2MjY5"
                                ]
                            },
                            "name": {
                                "type": "string",
                                "examples": [
                                    "Hello-World"
                                ]
                            },
                            "full_name": {
                                "type": "string",
                                "examples": [
                                    "octocat\\/Hello-World"
                                ]
                            },
                            "owner": {
                                "title": "Simple User",
                                "required": [
                                    "avatar_url",
                                    "events_url",
                                    "followers_url",
                                    "following_url",
                                    "gists_url",
                                    "gravatar_id",
                                    "html_url",
                                    "id",
                                    "node_id",
                                    "login",
                                    "organizations_url",
                                    "received_events_url",
                                    "repos_url",
                                    "site_admin",
                                    "starred_url",
                                    "subscriptions_url",
                                    "type",
                                    "url"
                                ],
                                "type": "object",
                                "properties": {
                                    "name": {
                                        "type": [
                                            "string",
                                            "null"
                                        ]
                                    },
                                    "email": {
                                        "type": [
                                            "string",
                                            "null"
                                        ]
                                    },
                                    "login": {
                                        "type": "string",
                                        "examples": [
                                            "octocat"
                                        ]
                                    },
                                    "id": {
                                        "type": "integer",
                                        "examples": [
                                            1
                                        ]
                                    },
                                    "node_id": {
                                        "type": "string",
                                        "examples": [
                                            "MDQ6VXNlcjE="
                                        ]
                                    },
                                    "avatar_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif"
                                        ]
                                    },
                                    "gravatar_id": {
                                        "type": [
                                            "string",
                                            "null"
                                        ],
                                        "examples": [
                                            "41d064eb2195891e12d0413f63227ea7"
                                        ]
                                    },
                                    "url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat"
                                        ]
                                    },
                                    "html_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/github.com\\/octocat"
                                        ]
                                    },
                                    "followers_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/followers"
                                        ]
                                    },
                                    "following_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}"
                                        ]
                                    },
                                    "gists_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}"
                                        ]
                                    },
                                    "starred_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}"
                                        ]
                                    },
                                    "subscriptions_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions"
                                        ]
                                    },
                                    "organizations_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs"
                                        ]
                                    },
                                    "repos_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/repos"
                                        ]
                                    },
                                    "events_url": {
                                        "type": "string",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}"
                                        ]
                                    },
                                    "received_events_url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events"
                                        ]
                                    },
                                    "type": {
                                        "type": "string",
                                        "examples": [
                                            "User"
                                        ]
                                    },
                                    "site_admin": {
                                        "type": "boolean"
                                    },
                                    "starred_at": {
                                        "type": "string",
                                        "examples": [
                                            "\\"2020-07-09T00:17:55Z\\""
                                        ]
                                    }
                                },
                                "description": "A GitHub user."
                            },
                            "private": {
                                "type": "boolean"
                            },
                            "html_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/github.com\\/octocat\\/Hello-World"
                                ]
                            },
                            "description": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "examples": [
                                    "This your first repo!"
                                ]
                            },
                            "fork": {
                                "type": "boolean"
                            },
                            "url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World"
                                ]
                            },
                            "archive_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/{archive_format}{\\/ref}"
                                ]
                            },
                            "assignees_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/assignees{\\/user}"
                                ]
                            },
                            "blobs_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/blobs{\\/sha}"
                                ]
                            },
                            "branches_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/branches{\\/branch}"
                                ]
                            },
                            "collaborators_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/collaborators{\\/collaborator}"
                                ]
                            },
                            "comments_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/comments{\\/number}"
                                ]
                            },
                            "commits_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/commits{\\/sha}"
                                ]
                            },
                            "compare_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/compare\\/{base}...{head}"
                                ]
                            },
                            "contents_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contents\\/{+path}"
                                ]
                            },
                            "contributors_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contributors"
                                ]
                            },
                            "deployments_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/deployments"
                                ]
                            },
                            "downloads_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/downloads"
                                ]
                            },
                            "events_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/events"
                                ]
                            },
                            "forks_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/forks"
                                ]
                            },
                            "git_commits_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/commits{\\/sha}"
                                ]
                            },
                            "git_refs_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/refs{\\/sha}"
                                ]
                            },
                            "git_tags_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/tags{\\/sha}"
                                ]
                            },
                            "git_url": {
                                "type": "string"
                            },
                            "issue_comment_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments{\\/number}"
                                ]
                            },
                            "issue_events_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/events{\\/number}"
                                ]
                            },
                            "issues_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues{\\/number}"
                                ]
                            },
                            "keys_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/keys{\\/key_id}"
                                ]
                            },
                            "labels_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/labels{\\/name}"
                                ]
                            },
                            "languages_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/languages"
                                ]
                            },
                            "merges_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/merges"
                                ]
                            },
                            "milestones_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/milestones{\\/number}"
                                ]
                            },
                            "notifications_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/notifications{?since,all,participating}"
                                ]
                            },
                            "pulls_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/pulls{\\/number}"
                                ]
                            },
                            "releases_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/releases{\\/id}"
                                ]
                            },
                            "ssh_url": {
                                "type": "string"
                            },
                            "stargazers_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/stargazers"
                                ]
                            },
                            "statuses_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/statuses\\/{sha}"
                                ]
                            },
                            "subscribers_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscribers"
                                ]
                            },
                            "subscription_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscription"
                                ]
                            },
                            "tags_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/tags"
                                ]
                            },
                            "teams_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/teams"
                                ]
                            },
                            "trees_url": {
                                "type": "string",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/trees{\\/sha}"
                                ]
                            },
                            "clone_url": {
                                "type": "string"
                            },
                            "mirror_url": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "hooks_url": {
                                "type": "string",
                                "format": "uri",
                                "examples": [
                                    "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/hooks"
                                ]
                            },
                            "svn_url": {
                                "type": "string"
                            },
                            "homepage": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "language": {
                                "type": [
                                    "string",
                                    "null"
                                ]
                            },
                            "forks_count": {
                                "type": "integer"
                            },
                            "stargazers_count": {
                                "type": "integer"
                            },
                            "watchers_count": {
                                "type": "integer"
                            },
                            "size": {
                                "type": "integer",
                                "description": "The size of the repository. Size is calculated hourly. When a repository is initially created, the size is 0."
                            },
                            "default_branch": {
                                "type": "string"
                            },
                            "open_issues_count": {
                                "type": "integer"
                            },
                            "is_template": {
                                "type": "boolean"
                            },
                            "topics": {
                                "type": "array",
                                "items": {
                                    "type": "string"
                                }
                            },
                            "has_issues": {
                                "type": "boolean"
                            },
                            "has_projects": {
                                "type": "boolean"
                            },
                            "has_wiki": {
                                "type": "boolean"
                            },
                            "has_pages": {
                                "type": "boolean"
                            },
                            "has_downloads": {
                                "type": "boolean"
                            },
                            "has_discussions": {
                                "type": "boolean"
                            },
                            "archived": {
                                "type": "boolean"
                            },
                            "disabled": {
                                "type": "boolean"
                            },
                            "visibility": {
                                "type": "string"
                            },
                            "pushed_at": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "format": "date-time",
                                "examples": [
                                    "2011-01-26T19:06:43Z"
                                ]
                            },
                            "created_at": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "format": "date-time",
                                "examples": [
                                    "2011-01-26T19:01:12Z"
                                ]
                            },
                            "updated_at": {
                                "type": [
                                    "string",
                                    "null"
                                ],
                                "format": "date-time",
                                "examples": [
                                    "2011-01-26T19:14:43Z"
                                ]
                            },
                            "permissions": {
                                "type": "object",
                                "properties": {
                                    "admin": {
                                        "type": "boolean"
                                    },
                                    "maintain": {
                                        "type": "boolean"
                                    },
                                    "push": {
                                        "type": "boolean"
                                    },
                                    "triage": {
                                        "type": "boolean"
                                    },
                                    "pull": {
                                        "type": "boolean"
                                    }
                                }
                            },
                            "role_name": {
                                "type": "string",
                                "examples": [
                                    "admin"
                                ]
                            },
                            "temp_clone_token": {
                                "type": "string"
                            },
                            "delete_branch_on_merge": {
                                "type": "boolean"
                            },
                            "subscribers_count": {
                                "type": "integer"
                            },
                            "network_count": {
                                "type": "integer"
                            },
                            "code_of_conduct": {
                                "title": "Code Of Conduct",
                                "required": [
                                    "url",
                                    "html_url",
                                    "key",
                                    "name"
                                ],
                                "type": "object",
                                "properties": {
                                    "key": {
                                        "type": "string",
                                        "examples": [
                                            "contributor_covenant"
                                        ]
                                    },
                                    "name": {
                                        "type": "string",
                                        "examples": [
                                            "Contributor Covenant"
                                        ]
                                    },
                                    "url": {
                                        "type": "string",
                                        "format": "uri",
                                        "examples": [
                                            "https:\\/\\/api.github.com\\/codes_of_conduct\\/contributor_covenant"
                                        ]
                                    },
                                    "body": {
                                        "type": "string",
                                        "examples": [
                                            "# Contributor Covenant Code of Conduct\\n\\n## Our Pledge\\n\\nIn the interest of fostering an open and welcoming environment, we as contributors and maintainers pledge to making participation in our project and our community a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.\\n\\n## Our Standards\\n\\nExamples of behavior that contributes to creating a positive environment include:\\n\\n* Using welcoming and inclusive language\\n* Being respectful of differing viewpoints and experiences\\n* Gracefully accepting constructive criticism\\n* Focusing on what is best for the community\\n* Showing empathy towards other community members\\n\\nExamples of unacceptable behavior by participants include:\\n\\n* The use of sexualized language or imagery and unwelcome sexual attention or advances\\n* Trolling, insulting\\/derogatory comments, and personal or political attacks\\n* Public or private harassment\\n* Publishing others\' private information, such as a physical or electronic address, without explicit permission\\n* Other conduct which could reasonably be considered inappropriate in a professional setting\\n\\n## Our Responsibilities\\n\\nProject maintainers are responsible for clarifying the standards of acceptable behavior and are expected to take appropriate and fair corrective action in response\\n                  to any instances of unacceptable behavior.\\n\\nProject maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct, or to ban temporarily or permanently any contributor for other behaviors that they deem inappropriate, threatening, offensive, or harmful.\\n\\n## Scope\\n\\nThis Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Examples of representing a project or community include using an official project e-mail address,\\n                  posting via an official social media account, or acting as an appointed representative at an online or offline event. Representation of a project may be further defined and clarified by project maintainers.\\n\\n## Enforcement\\n\\nInstances of abusive, harassing, or otherwise unacceptable behavior may be reported by contacting the project team at [EMAIL]. The project team will review and investigate all complaints, and will respond in a way that it deems appropriate to the circumstances. The project team is obligated to maintain confidentiality with regard to the reporter of an incident. Further details of specific enforcement policies may be posted separately.\\n\\nProject maintainers who do not follow or enforce the Code of Conduct in good faith may face temporary or permanent repercussions as determined by other members of the project\'s leadership.\\n\\n## Attribution\\n\\nThis Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4, available at [http:\\/\\/contributor-covenant.org\\/version\\/1\\/4][version]\\n\\n[homepage]: http:\\/\\/contributor-covenant.org\\n[version]: http:\\/\\/contributor-covenant.org\\/version\\/1\\/4\\/\\n"
                                        ]
                                    },
                                    "html_url": {
                                        "type": [
                                            "string",
                                            "null"
                                        ],
                                        "format": "uri"
                                    }
                                },
                                "description": "Code Of Conduct"
                            },
                            "license": {
                                "type": [
                                    "object",
                                    "null"
                                ],
                                "properties": {
                                    "key": {
                                        "type": "string"
                                    },
                                    "name": {
                                        "type": "string"
                                    },
                                    "spdx_id": {
                                        "type": "string"
                                    },
                                    "url": {
                                        "type": "string"
                                    },
                                    "node_id": {
                                        "type": "string"
                                    }
                                }
                            },
                            "forks": {
                                "type": "integer",
                                "examples": [
                                    0
                                ]
                            },
                            "open_issues": {
                                "type": "integer",
                                "examples": [
                                    0
                                ]
                            },
                            "watchers": {
                                "type": "integer",
                                "examples": [
                                    0
                                ]
                            },
                            "allow_forking": {
                                "type": "boolean"
                            },
                            "web_commit_signoff_required": {
                                "type": "boolean",
                                "examples": [
                                    false
                                ]
                            },
                            "security_and_analysis": {
                                "type": [
                                    "object",
                                    "null"
                                ],
                                "properties": {
                                    "advanced_security": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string"
                                            }
                                        }
                                    },
                                    "dependabot_security_updates": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string",
                                                "description": "The enablement status of Dependabot security updates for the repository."
                                            }
                                        },
                                        "description": "Enable or disable Dependabot security updates for the repository."
                                    },
                                    "secret_scanning": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string"
                                            }
                                        }
                                    },
                                    "secret_scanning_push_protection": {
                                        "type": "object",
                                        "properties": {
                                            "status": {
                                                "enum": [
                                                    "enabled",
                                                    "disabled"
                                                ],
                                                "type": "string"
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        "description": "Minimal Repository"
                    },
                    "head_repository_id": {
                        "type": "integer",
                        "examples": [
                            5
                        ]
                    },
                    "display_title": {
                        "type": "string",
                        "description": "The event-specific title associated with the run or the run-name if set, or the value of `run-name` if it is set in the workflow.",
                        "examples": [
                            "Simple Workflow"
                        ]
                    }
                },
                "description": "An invocation of a workflow"
            }
        }
    }
}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{
    "total_count": 11,
    "workflow_runs": [
        {
            "id": 5,
            "name": "Build",
            "node_id": "MDEwOkNoZWNrU3VpdGU1",
            "check_suite_id": 42,
            "check_suite_node_id": "MDEwOkNoZWNrU3VpdGU0Mg==",
            "head_branch": "master",
            "head_sha": "009b8a3a9ccbb128af87f9b1c0f4c62e8a304f6d",
            "path": "octocat\\/octo-repo\\/.github\\/workflows\\/ci.yml@main",
            "run_number": 106,
            "run_attempt": 1,
            "referenced_workflows": null,
            "event": "push",
            "status": "completed",
            "conclusion": "neutral",
            "workflow_id": 5,
            "url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5",
            "html_url": "https:\\/\\/github.com\\/github\\/hello-world\\/suites\\/4",
            "pull_requests": null,
            "created_at": "1970-01-01T00:00:00+00:00",
            "updated_at": "1970-01-01T00:00:00+00:00",
            "actor": {
                "name": "generated",
                "email": "generated",
                "login": "octocat",
                "id": 1,
                "node_id": "MDQ6VXNlcjE=",
                "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                "html_url": "https:\\/\\/github.com\\/octocat",
                "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                "type": "User",
                "site_admin": false,
                "starred_at": "\\"2020-07-09T00:17:55Z\\""
            },
            "triggering_actor": {
                "name": "generated",
                "email": "generated",
                "login": "octocat",
                "id": 1,
                "node_id": "MDQ6VXNlcjE=",
                "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                "html_url": "https:\\/\\/github.com\\/octocat",
                "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                "type": "User",
                "site_admin": false,
                "starred_at": "\\"2020-07-09T00:17:55Z\\""
            },
            "run_started_at": "1970-01-01T00:00:00+00:00",
            "jobs_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/jobs",
            "logs_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/logs",
            "check_suite_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/check-suites\\/12",
            "artifacts_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/rerun\\/artifacts",
            "cancel_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/cancel",
            "rerun_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/rerun",
            "previous_attempt_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/attempts\\/3",
            "workflow_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/workflows\\/main.yaml",
            "head_commit": {
                "id": "7638417db6d59f3c431d3e1f261cc637155684cd",
                "tree_id": "generated",
                "message": "Fix #42",
                "timestamp": "2014-08-09T08:02:04+12:00",
                "author": {
                    "name": "Monalisa Octocat",
                    "email": "monalisa.octocat@example.com"
                },
                "committer": {
                    "name": "Monalisa Octocat",
                    "email": "monalisa.octocat@example.com"
                }
            },
            "repository": {
                "id": 1296269,
                "node_id": "MDEwOlJlcG9zaXRvcnkxMjk2MjY5",
                "name": "Hello-World",
                "full_name": "octocat\\/Hello-World",
                "owner": {
                    "name": "generated",
                    "email": "generated",
                    "login": "octocat",
                    "id": 1,
                    "node_id": "MDQ6VXNlcjE=",
                    "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                    "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                    "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                    "html_url": "https:\\/\\/github.com\\/octocat",
                    "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                    "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                    "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                    "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                    "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                    "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                    "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                    "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                    "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                    "type": "User",
                    "site_admin": false,
                    "starred_at": "\\"2020-07-09T00:17:55Z\\""
                },
                "private": false,
                "html_url": "https:\\/\\/github.com\\/octocat\\/Hello-World",
                "description": "This your first repo!",
                "fork": false,
                "url": "https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World",
                "archive_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/{archive_format}{\\/ref}",
                "assignees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/assignees{\\/user}",
                "blobs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/blobs{\\/sha}",
                "branches_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/branches{\\/branch}",
                "collaborators_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/collaborators{\\/collaborator}",
                "comments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/comments{\\/number}",
                "commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/commits{\\/sha}",
                "compare_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/compare\\/{base}...{head}",
                "contents_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contents\\/{+path}",
                "contributors_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contributors",
                "deployments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/deployments",
                "downloads_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/downloads",
                "events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/events",
                "forks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/forks",
                "git_commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/commits{\\/sha}",
                "git_refs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/refs{\\/sha}",
                "git_tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/tags{\\/sha}",
                "git_url": "generated",
                "issue_comment_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments{\\/number}",
                "issue_events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/events{\\/number}",
                "issues_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues{\\/number}",
                "keys_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/keys{\\/key_id}",
                "labels_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/labels{\\/name}",
                "languages_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/languages",
                "merges_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/merges",
                "milestones_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/milestones{\\/number}",
                "notifications_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/notifications{?since,all,participating}",
                "pulls_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/pulls{\\/number}",
                "releases_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/releases{\\/id}",
                "ssh_url": "generated",
                "stargazers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/stargazers",
                "statuses_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/statuses\\/{sha}",
                "subscribers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscribers",
                "subscription_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscription",
                "tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/tags",
                "teams_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/teams",
                "trees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/trees{\\/sha}",
                "clone_url": "generated",
                "mirror_url": "generated",
                "hooks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/hooks",
                "svn_url": "generated",
                "homepage": "generated",
                "language": "generated",
                "forks_count": 11,
                "stargazers_count": 16,
                "watchers_count": 14,
                "size": 4,
                "default_branch": "generated",
                "open_issues_count": 17,
                "is_template": false,
                "topics": [
                    "generated",
                    "generated"
                ],
                "has_issues": false,
                "has_projects": false,
                "has_wiki": false,
                "has_pages": false,
                "has_downloads": false,
                "has_discussions": false,
                "archived": false,
                "disabled": false,
                "visibility": "generated",
                "pushed_at": "2011-01-26T19:06:43Z",
                "created_at": "2011-01-26T19:01:12Z",
                "updated_at": "2011-01-26T19:14:43Z",
                "permissions": {
                    "admin": false,
                    "maintain": false,
                    "push": false,
                    "triage": false,
                    "pull": false
                },
                "role_name": "admin",
                "temp_clone_token": "generated",
                "delete_branch_on_merge": false,
                "subscribers_count": 17,
                "network_count": 13,
                "code_of_conduct": {
                    "key": "contributor_covenant",
                    "name": "Contributor Covenant",
                    "url": "https:\\/\\/api.github.com\\/codes_of_conduct\\/contributor_covenant",
                    "body": "# Contributor Covenant Code of Conduct\\n\\n## Our Pledge\\n\\nIn the interest of fostering an open and welcoming environment, we as contributors and maintainers pledge to making participation in our project and our community a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.\\n\\n## Our Standards\\n\\nExamples of behavior that contributes to creating a positive environment include:\\n\\n* Using welcoming and inclusive language\\n* Being respectful of differing viewpoints and experiences\\n* Gracefully accepting constructive criticism\\n* Focusing on what is best for the community\\n* Showing empathy towards other community members\\n\\nExamples of unacceptable behavior by participants include:\\n\\n* The use of sexualized language or imagery and unwelcome sexual attention or advances\\n* Trolling, insulting\\/derogatory comments, and personal or political attacks\\n* Public or private harassment\\n* Publishing others\' private information, such as a physical or electronic address, without explicit permission\\n* Other conduct which could reasonably be considered inappropriate in a professional setting\\n\\n## Our Responsibilities\\n\\nProject maintainers are responsible for clarifying the standards of acceptable behavior and are expected to take appropriate and fair corrective action in response\\n                  to any instances of unacceptable behavior.\\n\\nProject maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct, or to ban temporarily or permanently any contributor for other behaviors that they deem inappropriate, threatening, offensive, or harmful.\\n\\n## Scope\\n\\nThis Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Examples of representing a project or community include using an official project e-mail address,\\n                  posting via an official social media account, or acting as an appointed representative at an online or offline event. Representation of a project may be further defined and clarified by project maintainers.\\n\\n## Enforcement\\n\\nInstances of abusive, harassing, or otherwise unacceptable behavior may be reported by contacting the project team at [EMAIL]. The project team will review and investigate all complaints, and will respond in a way that it deems appropriate to the circumstances. The project team is obligated to maintain confidentiality with regard to the reporter of an incident. Further details of specific enforcement policies may be posted separately.\\n\\nProject maintainers who do not follow or enforce the Code of Conduct in good faith may face temporary or permanent repercussions as determined by other members of the project\'s leadership.\\n\\n## Attribution\\n\\nThis Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4, available at [http:\\/\\/contributor-covenant.org\\/version\\/1\\/4][version]\\n\\n[homepage]: http:\\/\\/contributor-covenant.org\\n[version]: http:\\/\\/contributor-covenant.org\\/version\\/1\\/4\\/\\n",
                    "html_url": "https:\\/\\/example.com\\/"
                },
                "license": {
                    "key": "generated",
                    "name": "generated",
                    "spdx_id": "generated",
                    "url": "generated",
                    "node_id": "generated"
                },
                "forks": 0,
                "open_issues": 0,
                "watchers": 0,
                "allow_forking": false,
                "web_commit_signoff_required": false,
                "security_and_analysis": {
                    "advanced_security": {
                        "status": "disabled"
                    },
                    "dependabot_security_updates": {
                        "status": "disabled"
                    },
                    "secret_scanning": {
                        "status": "disabled"
                    },
                    "secret_scanning_push_protection": {
                        "status": "disabled"
                    }
                }
            },
            "head_repository": {
                "id": 1296269,
                "node_id": "MDEwOlJlcG9zaXRvcnkxMjk2MjY5",
                "name": "Hello-World",
                "full_name": "octocat\\/Hello-World",
                "owner": {
                    "name": "generated",
                    "email": "generated",
                    "login": "octocat",
                    "id": 1,
                    "node_id": "MDQ6VXNlcjE=",
                    "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                    "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                    "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                    "html_url": "https:\\/\\/github.com\\/octocat",
                    "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                    "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                    "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                    "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                    "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                    "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                    "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                    "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                    "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                    "type": "User",
                    "site_admin": false,
                    "starred_at": "\\"2020-07-09T00:17:55Z\\""
                },
                "private": false,
                "html_url": "https:\\/\\/github.com\\/octocat\\/Hello-World",
                "description": "This your first repo!",
                "fork": false,
                "url": "https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World",
                "archive_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/{archive_format}{\\/ref}",
                "assignees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/assignees{\\/user}",
                "blobs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/blobs{\\/sha}",
                "branches_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/branches{\\/branch}",
                "collaborators_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/collaborators{\\/collaborator}",
                "comments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/comments{\\/number}",
                "commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/commits{\\/sha}",
                "compare_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/compare\\/{base}...{head}",
                "contents_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contents\\/{+path}",
                "contributors_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contributors",
                "deployments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/deployments",
                "downloads_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/downloads",
                "events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/events",
                "forks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/forks",
                "git_commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/commits{\\/sha}",
                "git_refs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/refs{\\/sha}",
                "git_tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/tags{\\/sha}",
                "git_url": "generated",
                "issue_comment_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments{\\/number}",
                "issue_events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/events{\\/number}",
                "issues_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues{\\/number}",
                "keys_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/keys{\\/key_id}",
                "labels_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/labels{\\/name}",
                "languages_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/languages",
                "merges_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/merges",
                "milestones_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/milestones{\\/number}",
                "notifications_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/notifications{?since,all,participating}",
                "pulls_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/pulls{\\/number}",
                "releases_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/releases{\\/id}",
                "ssh_url": "generated",
                "stargazers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/stargazers",
                "statuses_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/statuses\\/{sha}",
                "subscribers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscribers",
                "subscription_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscription",
                "tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/tags",
                "teams_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/teams",
                "trees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/trees{\\/sha}",
                "clone_url": "generated",
                "mirror_url": "generated",
                "hooks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/hooks",
                "svn_url": "generated",
                "homepage": "generated",
                "language": "generated",
                "forks_count": 11,
                "stargazers_count": 16,
                "watchers_count": 14,
                "size": 4,
                "default_branch": "generated",
                "open_issues_count": 17,
                "is_template": false,
                "topics": [
                    "generated",
                    "generated"
                ],
                "has_issues": false,
                "has_projects": false,
                "has_wiki": false,
                "has_pages": false,
                "has_downloads": false,
                "has_discussions": false,
                "archived": false,
                "disabled": false,
                "visibility": "generated",
                "pushed_at": "2011-01-26T19:06:43Z",
                "created_at": "2011-01-26T19:01:12Z",
                "updated_at": "2011-01-26T19:14:43Z",
                "permissions": {
                    "admin": false,
                    "maintain": false,
                    "push": false,
                    "triage": false,
                    "pull": false
                },
                "role_name": "admin",
                "temp_clone_token": "generated",
                "delete_branch_on_merge": false,
                "subscribers_count": 17,
                "network_count": 13,
                "code_of_conduct": {
                    "key": "contributor_covenant",
                    "name": "Contributor Covenant",
                    "url": "https:\\/\\/api.github.com\\/codes_of_conduct\\/contributor_covenant",
                    "body": "# Contributor Covenant Code of Conduct\\n\\n## Our Pledge\\n\\nIn the interest of fostering an open and welcoming environment, we as contributors and maintainers pledge to making participation in our project and our community a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.\\n\\n## Our Standards\\n\\nExamples of behavior that contributes to creating a positive environment include:\\n\\n* Using welcoming and inclusive language\\n* Being respectful of differing viewpoints and experiences\\n* Gracefully accepting constructive criticism\\n* Focusing on what is best for the community\\n* Showing empathy towards other community members\\n\\nExamples of unacceptable behavior by participants include:\\n\\n* The use of sexualized language or imagery and unwelcome sexual attention or advances\\n* Trolling, insulting\\/derogatory comments, and personal or political attacks\\n* Public or private harassment\\n* Publishing others\' private information, such as a physical or electronic address, without explicit permission\\n* Other conduct which could reasonably be considered inappropriate in a professional setting\\n\\n## Our Responsibilities\\n\\nProject maintainers are responsible for clarifying the standards of acceptable behavior and are expected to take appropriate and fair corrective action in response\\n                  to any instances of unacceptable behavior.\\n\\nProject maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct, or to ban temporarily or permanently any contributor for other behaviors that they deem inappropriate, threatening, offensive, or harmful.\\n\\n## Scope\\n\\nThis Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Examples of representing a project or community include using an official project e-mail address,\\n                  posting via an official social media account, or acting as an appointed representative at an online or offline event. Representation of a project may be further defined and clarified by project maintainers.\\n\\n## Enforcement\\n\\nInstances of abusive, harassing, or otherwise unacceptable behavior may be reported by contacting the project team at [EMAIL]. The project team will review and investigate all complaints, and will respond in a way that it deems appropriate to the circumstances. The project team is obligated to maintain confidentiality with regard to the reporter of an incident. Further details of specific enforcement policies may be posted separately.\\n\\nProject maintainers who do not follow or enforce the Code of Conduct in good faith may face temporary or permanent repercussions as determined by other members of the project\'s leadership.\\n\\n## Attribution\\n\\nThis Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4, available at [http:\\/\\/contributor-covenant.org\\/version\\/1\\/4][version]\\n\\n[homepage]: http:\\/\\/contributor-covenant.org\\n[version]: http:\\/\\/contributor-covenant.org\\/version\\/1\\/4\\/\\n",
                    "html_url": "https:\\/\\/example.com\\/"
                },
                "license": {
                    "key": "generated",
                    "name": "generated",
                    "spdx_id": "generated",
                    "url": "generated",
                    "node_id": "generated"
                },
                "forks": 0,
                "open_issues": 0,
                "watchers": 0,
                "allow_forking": false,
                "web_commit_signoff_required": false,
                "security_and_analysis": {
                    "advanced_security": {
                        "status": "disabled"
                    },
                    "dependabot_security_updates": {
                        "status": "disabled"
                    },
                    "secret_scanning": {
                        "status": "disabled"
                    },
                    "secret_scanning_push_protection": {
                        "status": "disabled"
                    }
                }
            },
            "head_repository_id": 5,
            "display_title": "Simple Workflow"
        },
        {
            "id": 5,
            "name": "Build",
            "node_id": "MDEwOkNoZWNrU3VpdGU1",
            "check_suite_id": 42,
            "check_suite_node_id": "MDEwOkNoZWNrU3VpdGU0Mg==",
            "head_branch": "master",
            "head_sha": "009b8a3a9ccbb128af87f9b1c0f4c62e8a304f6d",
            "path": "octocat\\/octo-repo\\/.github\\/workflows\\/ci.yml@main",
            "run_number": 106,
            "run_attempt": 1,
            "referenced_workflows": null,
            "event": "push",
            "status": "completed",
            "conclusion": "neutral",
            "workflow_id": 5,
            "url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5",
            "html_url": "https:\\/\\/github.com\\/github\\/hello-world\\/suites\\/4",
            "pull_requests": null,
            "created_at": "1970-01-01T00:00:00+00:00",
            "updated_at": "1970-01-01T00:00:00+00:00",
            "actor": {
                "name": "generated",
                "email": "generated",
                "login": "octocat",
                "id": 1,
                "node_id": "MDQ6VXNlcjE=",
                "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                "html_url": "https:\\/\\/github.com\\/octocat",
                "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                "type": "User",
                "site_admin": false,
                "starred_at": "\\"2020-07-09T00:17:55Z\\""
            },
            "triggering_actor": {
                "name": "generated",
                "email": "generated",
                "login": "octocat",
                "id": 1,
                "node_id": "MDQ6VXNlcjE=",
                "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                "html_url": "https:\\/\\/github.com\\/octocat",
                "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                "type": "User",
                "site_admin": false,
                "starred_at": "\\"2020-07-09T00:17:55Z\\""
            },
            "run_started_at": "1970-01-01T00:00:00+00:00",
            "jobs_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/jobs",
            "logs_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/logs",
            "check_suite_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/check-suites\\/12",
            "artifacts_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/rerun\\/artifacts",
            "cancel_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/cancel",
            "rerun_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/rerun",
            "previous_attempt_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/runs\\/5\\/attempts\\/3",
            "workflow_url": "https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/actions\\/workflows\\/main.yaml",
            "head_commit": {
                "id": "7638417db6d59f3c431d3e1f261cc637155684cd",
                "tree_id": "generated",
                "message": "Fix #42",
                "timestamp": "2014-08-09T08:02:04+12:00",
                "author": {
                    "name": "Monalisa Octocat",
                    "email": "monalisa.octocat@example.com"
                },
                "committer": {
                    "name": "Monalisa Octocat",
                    "email": "monalisa.octocat@example.com"
                }
            },
            "repository": {
                "id": 1296269,
                "node_id": "MDEwOlJlcG9zaXRvcnkxMjk2MjY5",
                "name": "Hello-World",
                "full_name": "octocat\\/Hello-World",
                "owner": {
                    "name": "generated",
                    "email": "generated",
                    "login": "octocat",
                    "id": 1,
                    "node_id": "MDQ6VXNlcjE=",
                    "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                    "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                    "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                    "html_url": "https:\\/\\/github.com\\/octocat",
                    "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                    "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                    "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                    "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                    "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                    "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                    "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                    "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                    "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                    "type": "User",
                    "site_admin": false,
                    "starred_at": "\\"2020-07-09T00:17:55Z\\""
                },
                "private": false,
                "html_url": "https:\\/\\/github.com\\/octocat\\/Hello-World",
                "description": "This your first repo!",
                "fork": false,
                "url": "https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World",
                "archive_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/{archive_format}{\\/ref}",
                "assignees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/assignees{\\/user}",
                "blobs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/blobs{\\/sha}",
                "branches_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/branches{\\/branch}",
                "collaborators_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/collaborators{\\/collaborator}",
                "comments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/comments{\\/number}",
                "commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/commits{\\/sha}",
                "compare_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/compare\\/{base}...{head}",
                "contents_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contents\\/{+path}",
                "contributors_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contributors",
                "deployments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/deployments",
                "downloads_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/downloads",
                "events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/events",
                "forks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/forks",
                "git_commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/commits{\\/sha}",
                "git_refs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/refs{\\/sha}",
                "git_tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/tags{\\/sha}",
                "git_url": "generated",
                "issue_comment_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments{\\/number}",
                "issue_events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/events{\\/number}",
                "issues_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues{\\/number}",
                "keys_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/keys{\\/key_id}",
                "labels_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/labels{\\/name}",
                "languages_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/languages",
                "merges_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/merges",
                "milestones_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/milestones{\\/number}",
                "notifications_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/notifications{?since,all,participating}",
                "pulls_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/pulls{\\/number}",
                "releases_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/releases{\\/id}",
                "ssh_url": "generated",
                "stargazers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/stargazers",
                "statuses_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/statuses\\/{sha}",
                "subscribers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscribers",
                "subscription_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscription",
                "tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/tags",
                "teams_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/teams",
                "trees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/trees{\\/sha}",
                "clone_url": "generated",
                "mirror_url": "generated",
                "hooks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/hooks",
                "svn_url": "generated",
                "homepage": "generated",
                "language": "generated",
                "forks_count": 11,
                "stargazers_count": 16,
                "watchers_count": 14,
                "size": 4,
                "default_branch": "generated",
                "open_issues_count": 17,
                "is_template": false,
                "topics": [
                    "generated",
                    "generated"
                ],
                "has_issues": false,
                "has_projects": false,
                "has_wiki": false,
                "has_pages": false,
                "has_downloads": false,
                "has_discussions": false,
                "archived": false,
                "disabled": false,
                "visibility": "generated",
                "pushed_at": "2011-01-26T19:06:43Z",
                "created_at": "2011-01-26T19:01:12Z",
                "updated_at": "2011-01-26T19:14:43Z",
                "permissions": {
                    "admin": false,
                    "maintain": false,
                    "push": false,
                    "triage": false,
                    "pull": false
                },
                "role_name": "admin",
                "temp_clone_token": "generated",
                "delete_branch_on_merge": false,
                "subscribers_count": 17,
                "network_count": 13,
                "code_of_conduct": {
                    "key": "contributor_covenant",
                    "name": "Contributor Covenant",
                    "url": "https:\\/\\/api.github.com\\/codes_of_conduct\\/contributor_covenant",
                    "body": "# Contributor Covenant Code of Conduct\\n\\n## Our Pledge\\n\\nIn the interest of fostering an open and welcoming environment, we as contributors and maintainers pledge to making participation in our project and our community a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.\\n\\n## Our Standards\\n\\nExamples of behavior that contributes to creating a positive environment include:\\n\\n* Using welcoming and inclusive language\\n* Being respectful of differing viewpoints and experiences\\n* Gracefully accepting constructive criticism\\n* Focusing on what is best for the community\\n* Showing empathy towards other community members\\n\\nExamples of unacceptable behavior by participants include:\\n\\n* The use of sexualized language or imagery and unwelcome sexual attention or advances\\n* Trolling, insulting\\/derogatory comments, and personal or political attacks\\n* Public or private harassment\\n* Publishing others\' private information, such as a physical or electronic address, without explicit permission\\n* Other conduct which could reasonably be considered inappropriate in a professional setting\\n\\n## Our Responsibilities\\n\\nProject maintainers are responsible for clarifying the standards of acceptable behavior and are expected to take appropriate and fair corrective action in response\\n                  to any instances of unacceptable behavior.\\n\\nProject maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct, or to ban temporarily or permanently any contributor for other behaviors that they deem inappropriate, threatening, offensive, or harmful.\\n\\n## Scope\\n\\nThis Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Examples of representing a project or community include using an official project e-mail address,\\n                  posting via an official social media account, or acting as an appointed representative at an online or offline event. Representation of a project may be further defined and clarified by project maintainers.\\n\\n## Enforcement\\n\\nInstances of abusive, harassing, or otherwise unacceptable behavior may be reported by contacting the project team at [EMAIL]. The project team will review and investigate all complaints, and will respond in a way that it deems appropriate to the circumstances. The project team is obligated to maintain confidentiality with regard to the reporter of an incident. Further details of specific enforcement policies may be posted separately.\\n\\nProject maintainers who do not follow or enforce the Code of Conduct in good faith may face temporary or permanent repercussions as determined by other members of the project\'s leadership.\\n\\n## Attribution\\n\\nThis Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4, available at [http:\\/\\/contributor-covenant.org\\/version\\/1\\/4][version]\\n\\n[homepage]: http:\\/\\/contributor-covenant.org\\n[version]: http:\\/\\/contributor-covenant.org\\/version\\/1\\/4\\/\\n",
                    "html_url": "https:\\/\\/example.com\\/"
                },
                "license": {
                    "key": "generated",
                    "name": "generated",
                    "spdx_id": "generated",
                    "url": "generated",
                    "node_id": "generated"
                },
                "forks": 0,
                "open_issues": 0,
                "watchers": 0,
                "allow_forking": false,
                "web_commit_signoff_required": false,
                "security_and_analysis": {
                    "advanced_security": {
                        "status": "disabled"
                    },
                    "dependabot_security_updates": {
                        "status": "disabled"
                    },
                    "secret_scanning": {
                        "status": "disabled"
                    },
                    "secret_scanning_push_protection": {
                        "status": "disabled"
                    }
                }
            },
            "head_repository": {
                "id": 1296269,
                "node_id": "MDEwOlJlcG9zaXRvcnkxMjk2MjY5",
                "name": "Hello-World",
                "full_name": "octocat\\/Hello-World",
                "owner": {
                    "name": "generated",
                    "email": "generated",
                    "login": "octocat",
                    "id": 1,
                    "node_id": "MDQ6VXNlcjE=",
                    "avatar_url": "https:\\/\\/github.com\\/images\\/error\\/octocat_happy.gif",
                    "gravatar_id": "41d064eb2195891e12d0413f63227ea7",
                    "url": "https:\\/\\/api.github.com\\/users\\/octocat",
                    "html_url": "https:\\/\\/github.com\\/octocat",
                    "followers_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/followers",
                    "following_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/following{\\/other_user}",
                    "gists_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/gists{\\/gist_id}",
                    "starred_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/starred{\\/owner}{\\/repo}",
                    "subscriptions_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/subscriptions",
                    "organizations_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/orgs",
                    "repos_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/repos",
                    "events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/events{\\/privacy}",
                    "received_events_url": "https:\\/\\/api.github.com\\/users\\/octocat\\/received_events",
                    "type": "User",
                    "site_admin": false,
                    "starred_at": "\\"2020-07-09T00:17:55Z\\""
                },
                "private": false,
                "html_url": "https:\\/\\/github.com\\/octocat\\/Hello-World",
                "description": "This your first repo!",
                "fork": false,
                "url": "https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World",
                "archive_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/{archive_format}{\\/ref}",
                "assignees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/assignees{\\/user}",
                "blobs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/blobs{\\/sha}",
                "branches_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/branches{\\/branch}",
                "collaborators_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/collaborators{\\/collaborator}",
                "comments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/comments{\\/number}",
                "commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/commits{\\/sha}",
                "compare_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/compare\\/{base}...{head}",
                "contents_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contents\\/{+path}",
                "contributors_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/contributors",
                "deployments_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/deployments",
                "downloads_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/downloads",
                "events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/events",
                "forks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/forks",
                "git_commits_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/commits{\\/sha}",
                "git_refs_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/refs{\\/sha}",
                "git_tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/tags{\\/sha}",
                "git_url": "generated",
                "issue_comment_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments{\\/number}",
                "issue_events_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/events{\\/number}",
                "issues_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues{\\/number}",
                "keys_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/keys{\\/key_id}",
                "labels_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/labels{\\/name}",
                "languages_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/languages",
                "merges_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/merges",
                "milestones_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/milestones{\\/number}",
                "notifications_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/notifications{?since,all,participating}",
                "pulls_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/pulls{\\/number}",
                "releases_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/releases{\\/id}",
                "ssh_url": "generated",
                "stargazers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/stargazers",
                "statuses_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/statuses\\/{sha}",
                "subscribers_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscribers",
                "subscription_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/subscription",
                "tags_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/tags",
                "teams_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/teams",
                "trees_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/git\\/trees{\\/sha}",
                "clone_url": "generated",
                "mirror_url": "generated",
                "hooks_url": "http:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/hooks",
                "svn_url": "generated",
                "homepage": "generated",
                "language": "generated",
                "forks_count": 11,
                "stargazers_count": 16,
                "watchers_count": 14,
                "size": 4,
                "default_branch": "generated",
                "open_issues_count": 17,
                "is_template": false,
                "topics": [
                    "generated",
                    "generated"
                ],
                "has_issues": false,
                "has_projects": false,
                "has_wiki": false,
                "has_pages": false,
                "has_downloads": false,
                "has_discussions": false,
                "archived": false,
                "disabled": false,
                "visibility": "generated",
                "pushed_at": "2011-01-26T19:06:43Z",
                "created_at": "2011-01-26T19:01:12Z",
                "updated_at": "2011-01-26T19:14:43Z",
                "permissions": {
                    "admin": false,
                    "maintain": false,
                    "push": false,
                    "triage": false,
                    "pull": false
                },
                "role_name": "admin",
                "temp_clone_token": "generated",
                "delete_branch_on_merge": false,
                "subscribers_count": 17,
                "network_count": 13,
                "code_of_conduct": {
                    "key": "contributor_covenant",
                    "name": "Contributor Covenant",
                    "url": "https:\\/\\/api.github.com\\/codes_of_conduct\\/contributor_covenant",
                    "body": "# Contributor Covenant Code of Conduct\\n\\n## Our Pledge\\n\\nIn the interest of fostering an open and welcoming environment, we as contributors and maintainers pledge to making participation in our project and our community a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.\\n\\n## Our Standards\\n\\nExamples of behavior that contributes to creating a positive environment include:\\n\\n* Using welcoming and inclusive language\\n* Being respectful of differing viewpoints and experiences\\n* Gracefully accepting constructive criticism\\n* Focusing on what is best for the community\\n* Showing empathy towards other community members\\n\\nExamples of unacceptable behavior by participants include:\\n\\n* The use of sexualized language or imagery and unwelcome sexual attention or advances\\n* Trolling, insulting\\/derogatory comments, and personal or political attacks\\n* Public or private harassment\\n* Publishing others\' private information, such as a physical or electronic address, without explicit permission\\n* Other conduct which could reasonably be considered inappropriate in a professional setting\\n\\n## Our Responsibilities\\n\\nProject maintainers are responsible for clarifying the standards of acceptable behavior and are expected to take appropriate and fair corrective action in response\\n                  to any instances of unacceptable behavior.\\n\\nProject maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct, or to ban temporarily or permanently any contributor for other behaviors that they deem inappropriate, threatening, offensive, or harmful.\\n\\n## Scope\\n\\nThis Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Examples of representing a project or community include using an official project e-mail address,\\n                  posting via an official social media account, or acting as an appointed representative at an online or offline event. Representation of a project may be further defined and clarified by project maintainers.\\n\\n## Enforcement\\n\\nInstances of abusive, harassing, or otherwise unacceptable behavior may be reported by contacting the project team at [EMAIL]. The project team will review and investigate all complaints, and will respond in a way that it deems appropriate to the circumstances. The project team is obligated to maintain confidentiality with regard to the reporter of an incident. Further details of specific enforcement policies may be posted separately.\\n\\nProject maintainers who do not follow or enforce the Code of Conduct in good faith may face temporary or permanent repercussions as determined by other members of the project\'s leadership.\\n\\n## Attribution\\n\\nThis Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4, available at [http:\\/\\/contributor-covenant.org\\/version\\/1\\/4][version]\\n\\n[homepage]: http:\\/\\/contributor-covenant.org\\n[version]: http:\\/\\/contributor-covenant.org\\/version\\/1\\/4\\/\\n",
                    "html_url": "https:\\/\\/example.com\\/"
                },
                "license": {
                    "key": "generated",
                    "name": "generated",
                    "spdx_id": "generated",
                    "url": "generated",
                    "node_id": "generated"
                },
                "forks": 0,
                "open_issues": 0,
                "watchers": 0,
                "allow_forking": false,
                "web_commit_signoff_required": false,
                "security_and_analysis": {
                    "advanced_security": {
                        "status": "disabled"
                    },
                    "dependabot_security_updates": {
                        "status": "disabled"
                    },
                    "secret_scanning": {
                        "status": "disabled"
                    },
                    "secret_scanning_push_protection": {
                        "status": "disabled"
                    }
                }
            },
            "head_repository_id": 5,
            "display_title": "Simple Workflow"
        }
    ]
}';

    public function __construct(#[MapFrom('total_count')]
    public int $totalCount, #[MapFrom('workflow_runs')]
    public array $workflowRuns,)
    {
    }
}
