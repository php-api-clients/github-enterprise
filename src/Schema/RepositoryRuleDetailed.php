<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema;

final readonly class RepositoryRuleDetailed
{
    public const SCHEMA_JSON         = '{
    "title": "Repository Rule",
    "type": "object",
    "oneOf": [
        {
            "allOf": [
                {
                    "title": "creation",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "creation"
                            ],
                            "type": "string"
                        }
                    },
                    "description": "Only allow users with bypass permission to create matching refs."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "update",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "update"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "update_allows_fetch_and_merge"
                            ],
                            "type": "object",
                            "properties": {
                                "update_allows_fetch_and_merge": {
                                    "type": "boolean",
                                    "description": "Branch can pull changes from its upstream repository"
                                }
                            }
                        }
                    },
                    "description": "Only allow users with bypass permission to update matching refs."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "deletion",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "deletion"
                            ],
                            "type": "string"
                        }
                    },
                    "description": "Only allow users with bypass permissions to delete matching refs."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "required_linear_history",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "required_linear_history"
                            ],
                            "type": "string"
                        }
                    },
                    "description": "Prevent merge commits from being pushed to matching refs."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "required_deployments",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "required_deployments"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "required_deployment_environments"
                            ],
                            "type": "object",
                            "properties": {
                                "required_deployment_environments": {
                                    "type": "array",
                                    "items": {
                                        "type": "string"
                                    },
                                    "description": "The environments that must be successfully deployed to before branches can be merged."
                                }
                            }
                        }
                    },
                    "description": "Choose which environments must be successfully deployed to before refs can be pushed into a ref that matches this rule."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "required_signatures",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "required_signatures"
                            ],
                            "type": "string"
                        }
                    },
                    "description": "Commits pushed to matching refs must have verified signatures."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "pull_request",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "pull_request"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "dismiss_stale_reviews_on_push",
                                "require_code_owner_review",
                                "require_last_push_approval",
                                "required_approving_review_count",
                                "required_review_thread_resolution"
                            ],
                            "type": "object",
                            "properties": {
                                "dismiss_stale_reviews_on_push": {
                                    "type": "boolean",
                                    "description": "New, reviewable commits pushed will dismiss previous pull request review approvals."
                                },
                                "require_code_owner_review": {
                                    "type": "boolean",
                                    "description": "Require an approving review in pull requests that modify files that have a designated code owner."
                                },
                                "require_last_push_approval": {
                                    "type": "boolean",
                                    "description": "Whether the most recent reviewable push must be approved by someone other than the person who pushed it."
                                },
                                "required_approving_review_count": {
                                    "maximum": 10,
                                    "minimum": 0,
                                    "type": "integer",
                                    "description": "The number of approving reviews that are required before a pull request can be merged."
                                },
                                "required_review_thread_resolution": {
                                    "type": "boolean",
                                    "description": "All conversations on code must be resolved before a pull request can be merged."
                                }
                            }
                        }
                    },
                    "description": "Require all commits be made to a non-target branch and submitted via a pull request before they can be merged."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "required_status_checks",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "required_status_checks"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "required_status_checks",
                                "strict_required_status_checks_policy"
                            ],
                            "type": "object",
                            "properties": {
                                "required_status_checks": {
                                    "type": "array",
                                    "items": {
                                        "title": "StatusCheckConfiguration",
                                        "required": [
                                            "context"
                                        ],
                                        "type": "object",
                                        "properties": {
                                            "context": {
                                                "type": "string",
                                                "description": "The status check context name that must be present on the commit."
                                            },
                                            "integration_id": {
                                                "type": "integer",
                                                "description": "The optional integration ID that this status check must originate from."
                                            }
                                        },
                                        "description": "Required status check"
                                    },
                                    "description": "Status checks that are required."
                                },
                                "strict_required_status_checks_policy": {
                                    "type": "boolean",
                                    "description": "Whether pull requests targeting a matching branch must be tested with the latest code. This setting will not take effect unless at least one status check is enabled."
                                }
                            }
                        }
                    },
                    "description": "Choose which status checks must pass before the ref is updated. When enabled, commits must first be pushed to another ref where the checks pass."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "non_fast_forward",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "non_fast_forward"
                            ],
                            "type": "string"
                        }
                    },
                    "description": "Prevent users with push access from force pushing to refs."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "commit_message_pattern",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "commit_message_pattern"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "operator",
                                "pattern"
                            ],
                            "type": "object",
                            "properties": {
                                "name": {
                                    "type": "string",
                                    "description": "How this rule will appear to users."
                                },
                                "negate": {
                                    "type": "boolean",
                                    "description": "If true, the rule will fail if the pattern matches."
                                },
                                "operator": {
                                    "enum": [
                                        "starts_with",
                                        "ends_with",
                                        "contains",
                                        "regex"
                                    ],
                                    "type": "string",
                                    "description": "The operator to use for matching."
                                },
                                "pattern": {
                                    "type": "string",
                                    "description": "The pattern to match with."
                                }
                            }
                        }
                    },
                    "description": "Parameters to be used for the commit_message_pattern rule"
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "commit_author_email_pattern",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "commit_author_email_pattern"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "operator",
                                "pattern"
                            ],
                            "type": "object",
                            "properties": {
                                "name": {
                                    "type": "string",
                                    "description": "How this rule will appear to users."
                                },
                                "negate": {
                                    "type": "boolean",
                                    "description": "If true, the rule will fail if the pattern matches."
                                },
                                "operator": {
                                    "enum": [
                                        "starts_with",
                                        "ends_with",
                                        "contains",
                                        "regex"
                                    ],
                                    "type": "string",
                                    "description": "The operator to use for matching."
                                },
                                "pattern": {
                                    "type": "string",
                                    "description": "The pattern to match with."
                                }
                            }
                        }
                    },
                    "description": "Parameters to be used for the commit_author_email_pattern rule"
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "committer_email_pattern",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "committer_email_pattern"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "operator",
                                "pattern"
                            ],
                            "type": "object",
                            "properties": {
                                "name": {
                                    "type": "string",
                                    "description": "How this rule will appear to users."
                                },
                                "negate": {
                                    "type": "boolean",
                                    "description": "If true, the rule will fail if the pattern matches."
                                },
                                "operator": {
                                    "enum": [
                                        "starts_with",
                                        "ends_with",
                                        "contains",
                                        "regex"
                                    ],
                                    "type": "string",
                                    "description": "The operator to use for matching."
                                },
                                "pattern": {
                                    "type": "string",
                                    "description": "The pattern to match with."
                                }
                            }
                        }
                    },
                    "description": "Parameters to be used for the committer_email_pattern rule"
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "branch_name_pattern",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "branch_name_pattern"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "operator",
                                "pattern"
                            ],
                            "type": "object",
                            "properties": {
                                "name": {
                                    "type": "string",
                                    "description": "How this rule will appear to users."
                                },
                                "negate": {
                                    "type": "boolean",
                                    "description": "If true, the rule will fail if the pattern matches."
                                },
                                "operator": {
                                    "enum": [
                                        "starts_with",
                                        "ends_with",
                                        "contains",
                                        "regex"
                                    ],
                                    "type": "string",
                                    "description": "The operator to use for matching."
                                },
                                "pattern": {
                                    "type": "string",
                                    "description": "The pattern to match with."
                                }
                            }
                        }
                    },
                    "description": "Parameters to be used for the branch_name_pattern rule"
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "tag_name_pattern",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "tag_name_pattern"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "operator",
                                "pattern"
                            ],
                            "type": "object",
                            "properties": {
                                "name": {
                                    "type": "string",
                                    "description": "How this rule will appear to users."
                                },
                                "negate": {
                                    "type": "boolean",
                                    "description": "If true, the rule will fail if the pattern matches."
                                },
                                "operator": {
                                    "enum": [
                                        "starts_with",
                                        "ends_with",
                                        "contains",
                                        "regex"
                                    ],
                                    "type": "string",
                                    "description": "The operator to use for matching."
                                },
                                "pattern": {
                                    "type": "string",
                                    "description": "The pattern to match with."
                                }
                            }
                        }
                    },
                    "description": "Parameters to be used for the tag_name_pattern rule"
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        },
        {
            "allOf": [
                {
                    "title": "workflows",
                    "required": [
                        "type"
                    ],
                    "type": "object",
                    "properties": {
                        "type": {
                            "enum": [
                                "workflows"
                            ],
                            "type": "string"
                        },
                        "parameters": {
                            "required": [
                                "workflows"
                            ],
                            "type": "object",
                            "properties": {
                                "workflows": {
                                    "type": "array",
                                    "items": {
                                        "title": "WorkflowFileReference",
                                        "required": [
                                            "path",
                                            "repository_id"
                                        ],
                                        "type": "object",
                                        "properties": {
                                            "path": {
                                                "type": "string",
                                                "description": "The path to the workflow file"
                                            },
                                            "ref": {
                                                "type": "string",
                                                "description": "The ref (branch or tag) of the workflow file to use"
                                            },
                                            "repository_id": {
                                                "type": "integer",
                                                "description": "The ID of the repository where the workflow is defined"
                                            },
                                            "sha": {
                                                "type": "string",
                                                "description": "The commit SHA of the workflow file to use"
                                            }
                                        },
                                        "description": "A workflow that must run for this rule to pass"
                                    },
                                    "description": "Workflows that must pass for this rule to pass."
                                }
                            }
                        }
                    },
                    "description": "Require all changes made to a targeted branch to pass the specified workflows before they can be merged."
                },
                {
                    "title": "repository ruleset data for rule",
                    "properties": {
                        "ruleset_source_type": {
                            "enum": [
                                "Repository",
                                "Organization"
                            ],
                            "type": "string",
                            "description": "The type of source for the ruleset that includes this rule."
                        },
                        "ruleset_source": {
                            "type": "string",
                            "description": "The name of the source of the ruleset that includes this rule."
                        },
                        "ruleset_id": {
                            "type": "integer",
                            "description": "The ID of the ruleset that includes this rule."
                        }
                    },
                    "description": "User-defined metadata to store domain-specific information limited to 8 keys with scalar values."
                }
            ]
        }
    ],
    "description": "A repository rule with ruleset details."
}';
    public const SCHEMA_TITLE        = 'Repository Rule';
    public const SCHEMA_DESCRIPTION  = 'A repository rule with ruleset details.';
    public const SCHEMA_EXAMPLE_DATA = '[]';

    public function __construct()
    {
    }
}
