<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Post;

use ApiClients\Client\GitHubEnterprise\Routers;
use ApiClients\Client\GitHubEnterprise\Schema\EmptyObject;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\Orgs\RedeliverWebhookDelivery\Response\ApplicationJson\Accepted\Application\Json;
use ApiClients\Client\GitHubEnterprise\Schema\ProtectedBranchAdminEnforced;
use ApiClients\Client\GitHubEnterprise\Schema\Reaction;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussionComment;
use InvalidArgumentException;

final class Eight
{
    public function __construct(private Routers $routers)
    {
    }

    /** @return |iterable<Schema\Deployment>|array{code:int} */
    public function call(string $call, array $params, array $pathChunks): Json|TeamDiscussionComment|Reaction|EmptyObject|Ok|iterable|ProtectedBranchAdminEnforced
    {
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($pathChunks[3] === 'hooks') {
                        if ($pathChunks[4] === '{hook_id}') {
                            if ($pathChunks[5] === 'deliveries') {
                                if ($pathChunks[6] === '{delivery_id}') {
                                    if ($pathChunks[7] === 'attempts') {
                                        if ($call === 'POST /orgs/{org}/hooks/{hook_id}/deliveries/{delivery_id}/attempts') {
                                            return $this->routers->router🔀Post🔀Orgs()->redeliverWebhookDelivery($params);
                                        }
                                    }
                                }
                            }
                        }
                    } elseif ($pathChunks[3] === 'teams') {
                        if ($pathChunks[4] === '{team_slug}') {
                            if ($pathChunks[5] === 'discussions') {
                                if ($pathChunks[6] === '{discussion_number}') {
                                    if ($pathChunks[7] === 'comments') {
                                        if ($call === 'POST /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/comments') {
                                            return $this->routers->router🔀Post🔀Teams()->createDiscussionCommentInOrg($params);
                                        }
                                    } elseif ($pathChunks[7] === 'reactions') {
                                        if ($call === 'POST /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/reactions') {
                                            return $this->routers->router🔀Post🔀Reactions()->createForTeamDiscussionInOrg($params);
                                        }
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
                            if ($pathChunks[5] === 'jobs') {
                                if ($pathChunks[6] === '{job_id}') {
                                    if ($pathChunks[7] === 'rerun') {
                                        if ($call === 'POST /repos/{owner}/{repo}/actions/jobs/{job_id}/rerun') {
                                            return $this->routers->router🔀Post🔀Actions()->reRunJobForWorkflowRun($params);
                                        }
                                    }
                                }
                            } elseif ($pathChunks[5] === 'runners') {
                                if ($pathChunks[6] === '{runner_id}') {
                                    if ($pathChunks[7] === 'labels') {
                                        if ($call === 'POST /repos/{owner}/{repo}/actions/runners/{runner_id}/labels') {
                                            return $this->routers->router🔀Post🔀Actions()->addCustomLabelsToSelfHostedRunnerForRepo($params);
                                        }
                                    }
                                }
                            } elseif ($pathChunks[5] === 'runs') {
                                if ($pathChunks[6] === '{run_id}') {
                                    if ($pathChunks[7] === 'cancel') {
                                        if ($call === 'POST /repos/{owner}/{repo}/actions/runs/{run_id}/cancel') {
                                            return $this->routers->router🔀Post🔀Actions()->cancelWorkflowRun($params);
                                        }
                                    } elseif ($pathChunks[7] === 'pending_deployments') {
                                        if ($call === 'POST /repos/{owner}/{repo}/actions/runs/{run_id}/pending_deployments') {
                                            return $this->routers->router🔀Post🔀Actions()->reviewPendingDeploymentsForRun($params);
                                        }
                                    } elseif ($pathChunks[7] === 'rerun') {
                                        if ($call === 'POST /repos/{owner}/{repo}/actions/runs/{run_id}/rerun') {
                                            return $this->routers->router🔀Post🔀Actions()->reRunWorkflow($params);
                                        }
                                    } elseif ($pathChunks[7] === 'rerun-failed-jobs') {
                                        if ($call === 'POST /repos/{owner}/{repo}/actions/runs/{run_id}/rerun-failed-jobs') {
                                            return $this->routers->router🔀Post🔀Actions()->reRunWorkflowFailedJobs($params);
                                        }
                                    }
                                }
                            } elseif ($pathChunks[5] === 'workflows') {
                                if ($pathChunks[6] === '{workflow_id}') {
                                    if ($pathChunks[7] === 'dispatches') {
                                        if ($call === 'POST /repos/{owner}/{repo}/actions/workflows/{workflow_id}/dispatches') {
                                            return $this->routers->router🔀Post🔀Actions()->createWorkflowDispatch($params);
                                        }
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'branches') {
                            if ($pathChunks[5] === '{branch}') {
                                if ($pathChunks[6] === 'protection') {
                                    if ($pathChunks[7] === 'enforce_admins') {
                                        if ($call === 'POST /repos/{owner}/{repo}/branches/{branch}/protection/enforce_admins') {
                                            return $this->routers->router🔀Post🔀Repos()->setAdminBranchProtection($params);
                                        }
                                    } elseif ($pathChunks[7] === 'required_signatures') {
                                        if ($call === 'POST /repos/{owner}/{repo}/branches/{branch}/protection/required_signatures') {
                                            return $this->routers->router🔀Post🔀Repos()->createCommitSignatureProtection($params);
                                        }
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'issues') {
                            if ($pathChunks[5] === 'comments') {
                                if ($pathChunks[6] === '{comment_id}') {
                                    if ($pathChunks[7] === 'reactions') {
                                        if ($call === 'POST /repos/{owner}/{repo}/issues/comments/{comment_id}/reactions') {
                                            return $this->routers->router🔀Post🔀Reactions()->createForIssueComment($params);
                                        }
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'pulls') {
                            if ($pathChunks[5] === 'comments') {
                                if ($pathChunks[6] === '{comment_id}') {
                                    if ($pathChunks[7] === 'reactions') {
                                        if ($call === 'POST /repos/{owner}/{repo}/pulls/comments/{comment_id}/reactions') {
                                            return $this->routers->router🔀Post🔀Reactions()->createForPullRequestReviewComment($params);
                                        }
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
                                    if ($pathChunks[7] === 'reactions') {
                                        if ($call === 'POST /teams/{team_id}/discussions/{discussion_number}/comments/{comment_number}/reactions') {
                                            return $this->routers->router🔀Post🔀Reactions()->createForTeamDiscussionCommentLegacy($params);
                                        }
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
