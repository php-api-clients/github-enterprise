<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Post;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\Schema\AuthenticationToken;
use ApiClients\Client\GitHubEnterprise\Schema\BasicError;
use ApiClients\Client\GitHubEnterprise\Schema\BranchWithProtection;
use ApiClients\Client\GitHubEnterprise\Schema\CommitComment;
use ApiClients\Client\GitHubEnterprise\Schema\DeploymentBranchPolicy;
use ApiClients\Client\GitHubEnterprise\Schema\DeploymentStatus;
use ApiClients\Client\GitHubEnterprise\Schema\EmptyObject;
use ApiClients\Client\GitHubEnterprise\Schema\Issue;
use ApiClients\Client\GitHubEnterprise\Schema\IssueComment;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Client\GitHubEnterprise\Schema\PullRequestReview;
use ApiClients\Client\GitHubEnterprise\Schema\PullRequestReviewComment;
use ApiClients\Client\GitHubEnterprise\Schema\PullRequestSimple;
use ApiClients\Client\GitHubEnterprise\Schema\Reaction;
use ApiClients\Client\GitHubEnterprise\Schema\ReleaseAsset;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Seven
{
    private array $router = [];

    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return |(Schema\DeploymentBranchPolicy|array{code: int})|array{code: int}|(iterable<Schema\Label>|Schema\BasicError)|(Schema\PullRequestSimple|(Schema\ReleaseAsset */
    public function call(string $call, array $params, array $pathChunks): Ok|AuthenticationToken|BranchWithProtection|EmptyObject|Reaction|CommitComment|DeploymentStatus|DeploymentBranchPolicy|Issue|IssueComment|iterable|BasicError|PullRequestReviewComment|PullRequestSimple|PullRequestReview|ReleaseAsset
    {
        $matched = false;
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'enterprises') {
                if ($pathChunks[2] === '{enterprise}') {
                    if ($pathChunks[3] === 'actions') {
                        if ($pathChunks[4] === 'runners') {
                            if ($pathChunks[5] === '{runner_id}') {
                                if ($pathChunks[6] === 'labels') {
                                    if ($call === 'POST /enterprises/{enterprise}/actions/runners/{runner_id}/labels') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\EnterpriseAdmin::class, $this->router) === false) {
                                            $this->router[Router\Post\EnterpriseAdmin::class] = new Router\Post\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\EnterpriseAdmin::class]->addCustomLabelsToSelfHostedRunnerForEnterprise($params);
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($pathChunks[3] === 'actions') {
                        if ($pathChunks[4] === 'runners') {
                            if ($pathChunks[5] === '{runner_id}') {
                                if ($pathChunks[6] === 'labels') {
                                    if ($call === 'POST /orgs/{org}/actions/runners/{runner_id}/labels') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Actions::class, $this->router) === false) {
                                            $this->router[Router\Post\Actions::class] = new Router\Post\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Actions::class]->addCustomLabelsToSelfHostedRunnerForOrg($params);
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
                            if ($pathChunks[5] === 'runners') {
                                if ($pathChunks[6] === 'registration-token') {
                                    if ($call === 'POST /repos/{owner}/{repo}/actions/runners/registration-token') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Actions::class, $this->router) === false) {
                                            $this->router[Router\Post\Actions::class] = new Router\Post\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Actions::class]->createRegistrationTokenForRepo($params);
                                    }
                                } elseif ($pathChunks[6] === 'remove-token') {
                                    if ($call === 'POST /repos/{owner}/{repo}/actions/runners/remove-token') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Actions::class, $this->router) === false) {
                                            $this->router[Router\Post\Actions::class] = new Router\Post\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Actions::class]->createRemoveTokenForRepo($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'branches') {
                            if ($pathChunks[5] === '{branch}') {
                                if ($pathChunks[6] === 'rename') {
                                    if ($call === 'POST /repos/{owner}/{repo}/branches/{branch}/rename') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                            $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Repos::class]->renameBranch($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'check-runs') {
                            if ($pathChunks[5] === '{check_run_id}') {
                                if ($pathChunks[6] === 'rerequest') {
                                    if ($call === 'POST /repos/{owner}/{repo}/check-runs/{check_run_id}/rerequest') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Checks::class, $this->router) === false) {
                                            $this->router[Router\Post\Checks::class] = new Router\Post\Checks($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Checks::class]->rerequestRun($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'check-suites') {
                            if ($pathChunks[5] === '{check_suite_id}') {
                                if ($pathChunks[6] === 'rerequest') {
                                    if ($call === 'POST /repos/{owner}/{repo}/check-suites/{check_suite_id}/rerequest') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Checks::class, $this->router) === false) {
                                            $this->router[Router\Post\Checks::class] = new Router\Post\Checks($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Checks::class]->rerequestSuite($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'comments') {
                            if ($pathChunks[5] === '{comment_id}') {
                                if ($pathChunks[6] === 'reactions') {
                                    if ($call === 'POST /repos/{owner}/{repo}/comments/{comment_id}/reactions') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Reactions::class, $this->router) === false) {
                                            $this->router[Router\Post\Reactions::class] = new Router\Post\Reactions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Reactions::class]->createForCommitComment($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'commits') {
                            if ($pathChunks[5] === '{commit_sha}') {
                                if ($pathChunks[6] === 'comments') {
                                    if ($call === 'POST /repos/{owner}/{repo}/commits/{commit_sha}/comments') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                            $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Repos::class]->createCommitComment($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'deployments') {
                            if ($pathChunks[5] === '{deployment_id}') {
                                if ($pathChunks[6] === 'statuses') {
                                    if ($call === 'POST /repos/{owner}/{repo}/deployments/{deployment_id}/statuses') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                            $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Repos::class]->createDeploymentStatus($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'environments') {
                            if ($pathChunks[5] === '{environment_name}') {
                                if ($pathChunks[6] === 'deployment-branch-policies') {
                                    if ($call === 'POST /repos/{owner}/{repo}/environments/{environment_name}/deployment-branch-policies') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                            $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Repos::class]->createDeploymentBranchPolicy($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'hooks') {
                            if ($pathChunks[5] === '{hook_id}') {
                                if ($pathChunks[6] === 'pings') {
                                    if ($call === 'POST /repos/{owner}/{repo}/hooks/{hook_id}/pings') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                            $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Repos::class]->pingWebhook($params);
                                    }
                                } elseif ($pathChunks[6] === 'tests') {
                                    if ($call === 'POST /repos/{owner}/{repo}/hooks/{hook_id}/tests') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                            $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Repos::class]->testPushWebhook($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'issues') {
                            if ($pathChunks[5] === '{issue_number}') {
                                if ($pathChunks[6] === 'assignees') {
                                    if ($call === 'POST /repos/{owner}/{repo}/issues/{issue_number}/assignees') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Issues::class, $this->router) === false) {
                                            $this->router[Router\Post\Issues::class] = new Router\Post\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Issues::class]->addAssignees($params);
                                    }
                                } elseif ($pathChunks[6] === 'comments') {
                                    if ($call === 'POST /repos/{owner}/{repo}/issues/{issue_number}/comments') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Issues::class, $this->router) === false) {
                                            $this->router[Router\Post\Issues::class] = new Router\Post\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Issues::class]->createComment($params);
                                    }
                                } elseif ($pathChunks[6] === 'labels') {
                                    if ($call === 'POST /repos/{owner}/{repo}/issues/{issue_number}/labels') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Issues::class, $this->router) === false) {
                                            $this->router[Router\Post\Issues::class] = new Router\Post\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Issues::class]->addLabels($params);
                                    }
                                } elseif ($pathChunks[6] === 'reactions') {
                                    if ($call === 'POST /repos/{owner}/{repo}/issues/{issue_number}/reactions') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Reactions::class, $this->router) === false) {
                                            $this->router[Router\Post\Reactions::class] = new Router\Post\Reactions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Reactions::class]->createForIssue($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'pulls') {
                            if ($pathChunks[5] === '{pull_number}') {
                                if ($pathChunks[6] === 'comments') {
                                    if ($call === 'POST /repos/{owner}/{repo}/pulls/{pull_number}/comments') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Pulls::class, $this->router) === false) {
                                            $this->router[Router\Post\Pulls::class] = new Router\Post\Pulls($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Pulls::class]->createReviewComment($params);
                                    }
                                } elseif ($pathChunks[6] === 'requested_reviewers') {
                                    if ($call === 'POST /repos/{owner}/{repo}/pulls/{pull_number}/requested_reviewers') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Pulls::class, $this->router) === false) {
                                            $this->router[Router\Post\Pulls::class] = new Router\Post\Pulls($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Pulls::class]->requestReviewers($params);
                                    }
                                } elseif ($pathChunks[6] === 'reviews') {
                                    if ($call === 'POST /repos/{owner}/{repo}/pulls/{pull_number}/reviews') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Pulls::class, $this->router) === false) {
                                            $this->router[Router\Post\Pulls::class] = new Router\Post\Pulls($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Pulls::class]->createReview($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'releases') {
                            if ($pathChunks[5] === '{release_id}') {
                                if ($pathChunks[6] === 'assets') {
                                    if ($call === 'POST /repos/{owner}/{repo}/releases/{release_id}/assets') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                            $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Repos::class]->uploadReleaseAsset($params);
                                    }
                                } elseif ($pathChunks[6] === 'reactions') {
                                    if ($call === 'POST /repos/{owner}/{repo}/releases/{release_id}/reactions') {
                                        $matched = true;
                                        if (array_key_exists(Router\Post\Reactions::class, $this->router) === false) {
                                            $this->router[Router\Post\Reactions::class] = new Router\Post\Reactions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                        }

                                        return $this->router[Router\Post\Reactions::class]->createForRelease($params);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($matched === false) {
            throw new InvalidArgumentException();
        }
    }
}
