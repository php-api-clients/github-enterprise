<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Router\Patch;

use ApiClients\Client\GitHubEnterprise\Internal\Routers;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningAlert;
use ApiClients\Client\GitHubEnterprise\Schema\DependabotAlert;
use ApiClients\Client\GitHubEnterprise\Schema\GitRef;
use ApiClients\Client\GitHubEnterprise\Schema\IssueComment;
use ApiClients\Client\GitHubEnterprise\Schema\PullRequestReviewComment;
use ApiClients\Client\GitHubEnterprise\Schema\ReleaseAsset;
use ApiClients\Client\GitHubEnterprise\Schema\SecretScanningAlert;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussion;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussionComment;
use ApiClients\Client\GitHubEnterprise\Schema\WebhookConfig;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;
use InvalidArgumentException;

final class Seven
{
    public function __construct(private Routers $routers)
    {
    }

    public function call(string $call, array $params, array $pathChunks): TeamDiscussion|WithoutBody|CodeScanningAlert|DependabotAlert|GitRef|WebhookConfig|IssueComment|PullRequestReviewComment|ReleaseAsset|SecretScanningAlert|TeamDiscussionComment
    {
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($pathChunks[3] === 'teams') {
                        if ($pathChunks[4] === '{team_slug}') {
                            if ($pathChunks[5] === 'discussions') {
                                if ($pathChunks[6] === '{discussion_number}') {
                                    if ($call === 'PATCH /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Teams()->updateDiscussionInOrg($params);
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'repos') {
                if ($pathChunks[2] === '{owner}') {
                    if ($pathChunks[3] === '{repo}') {
                        if ($pathChunks[4] === 'actions') {
                            if ($pathChunks[5] === 'cache') {
                                if ($pathChunks[6] === 'usage-policy') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/actions/cache/usage-policy') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Actions()->setActionsCacheUsagePolicy($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'variables') {
                                if ($pathChunks[6] === '{name}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/actions/variables/{name}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Actions()->updateRepoVariable($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'code-scanning') {
                            if ($pathChunks[5] === 'alerts') {
                                if ($pathChunks[6] === '{alert_number}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/code-scanning/alerts/{alert_number}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀CodeScanning()->updateAlert($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'dependabot') {
                            if ($pathChunks[5] === 'alerts') {
                                if ($pathChunks[6] === '{alert_number}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/dependabot/alerts/{alert_number}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Dependabot()->updateAlert($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'git') {
                            if ($pathChunks[5] === 'refs') {
                                if ($pathChunks[6] === '{ref}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/git/refs/{ref}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Git()->updateRef($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'hooks') {
                            if ($pathChunks[5] === '{hook_id}') {
                                if ($pathChunks[6] === 'config') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/hooks/{hook_id}/config') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Repos()->updateWebhookConfigForRepo($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'issues') {
                            if ($pathChunks[5] === 'comments') {
                                if ($pathChunks[6] === '{comment_id}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/issues/comments/{comment_id}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Issues()->updateComment($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'pulls') {
                            if ($pathChunks[5] === 'comments') {
                                if ($pathChunks[6] === '{comment_id}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/pulls/comments/{comment_id}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Pulls()->updateReviewComment($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'releases') {
                            if ($pathChunks[5] === 'assets') {
                                if ($pathChunks[6] === '{asset_id}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/releases/assets/{asset_id}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Repos()->updateReleaseAsset($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'secret-scanning') {
                            if ($pathChunks[5] === 'alerts') {
                                if ($pathChunks[6] === '{alert_number}') {
                                    if ($call === 'PATCH /repos/{owner}/{repo}/secret-scanning/alerts/{alert_number}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀SecretScanning()->updateAlert($params);
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'repositories') {
                if ($pathChunks[2] === '{repository_id}') {
                    if ($pathChunks[3] === 'environments') {
                        if ($pathChunks[4] === '{environment_name}') {
                            if ($pathChunks[5] === 'variables') {
                                if ($pathChunks[6] === '{name}') {
                                    if ($call === 'PATCH /repositories/{repository_id}/environments/{environment_name}/variables/{name}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Actions()->updateEnvironmentVariable($params);
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'teams') {
                if ($pathChunks[2] === '{team_id}') {
                    if ($pathChunks[3] === 'discussions') {
                        if ($pathChunks[4] === '{discussion_number}') {
                            if ($pathChunks[5] === 'comments') {
                                if ($pathChunks[6] === '{comment_number}') {
                                    if ($call === 'PATCH /teams/{team_id}/discussions/{discussion_number}/comments/{comment_number}') {
                                        return $this->routers->internal🔀Router🔀Patch🔀Teams()->updateDiscussionCommentLegacy($params);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        throw new InvalidArgumentException();
    }
}
