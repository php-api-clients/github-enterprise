<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Router\Get;

use ApiClients\Client\GitHubEnterprise\Internal\Routers;
use ApiClients\Client\GitHubEnterprise\Schema\ActionsPublicKey;
use ApiClients\Client\GitHubEnterprise\Schema\ActionsSecret;
use ApiClients\Client\GitHubEnterprise\Schema\Artifact;
use ApiClients\Client\GitHubEnterprise\Schema\BasicError;
use ApiClients\Client\GitHubEnterprise\Schema\Blob;
use ApiClients\Client\GitHubEnterprise\Schema\BranchProtection;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningAlert;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningAnalysis;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningSarifsStatus;
use ApiClients\Client\GitHubEnterprise\Schema\CombinedCommitStatus;
use ApiClients\Client\GitHubEnterprise\Schema\DependabotPublicKey;
use ApiClients\Client\GitHubEnterprise\Schema\DependabotSecret;
use ApiClients\Client\GitHubEnterprise\Schema\GitCommit;
use ApiClients\Client\GitHubEnterprise\Schema\GitRef;
use ApiClients\Client\GitHubEnterprise\Schema\GitTag;
use ApiClients\Client\GitHubEnterprise\Schema\GitTree;
use ApiClients\Client\GitHubEnterprise\Schema\HookDelivery;
use ApiClients\Client\GitHubEnterprise\Schema\IssueComment;
use ApiClients\Client\GitHubEnterprise\Schema\IssueEvent;
use ApiClients\Client\GitHubEnterprise\Schema\Job;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListOrgAccessToSelfHostedRunnerGroupInEnterprise\Response\ApplicationJson\Ok\Application\Json;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListSelfHostedRunnersInGroupForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Client\GitHubEnterprise\Schema\PageBuild;
use ApiClients\Client\GitHubEnterprise\Schema\PullRequestReviewComment;
use ApiClients\Client\GitHubEnterprise\Schema\PullRequestReviewRequest;
use ApiClients\Client\GitHubEnterprise\Schema\Release;
use ApiClients\Client\GitHubEnterprise\Schema\ReleaseAsset;
use ApiClients\Client\GitHubEnterprise\Schema\RepositoryCollaboratorPermission;
use ApiClients\Client\GitHubEnterprise\Schema\Runner;
use ApiClients\Client\GitHubEnterprise\Schema\SecretScanningAlert;
use ApiClients\Client\GitHubEnterprise\Schema\SelectedActions;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussion;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussionComment;
use ApiClients\Client\GitHubEnterprise\Schema\TeamMembership;
use ApiClients\Client\GitHubEnterprise\Schema\TeamProject;
use ApiClients\Client\GitHubEnterprise\Schema\WebhookConfig;
use ApiClients\Client\GitHubEnterprise\Schema\Workflow;
use ApiClients\Client\GitHubEnterprise\Schema\WorkflowRun;
use InvalidArgumentException;

final class Seven
{
    public function __construct(private Routers $routers)
    {
    }

    /** @return Schema\Operations\EnterpriseAdmin\ListOrgAccessToSelfHostedRunnerGroupInEnterprise\Response\ApplicationJson\Ok\Application\Json|Schema\Operations\EnterpriseAdmin\ListSelfHostedRunnersInGroupForEnterprise\Response\ApplicationJson\Ok|Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok|Schema\Operations\Actions\ListRepoAccessToSelfHostedRunnerGroupInOrg\Response\ApplicationJson\Ok|Schema\Operations\Actions\ListSelfHostedRunnersInGroupForOrg\Response\ApplicationJson\Ok\Application\Json|Schema\Operations\Actions\ListSelectedReposForOrgSecret\Response\ApplicationJson\Ok|Schema\Operations\Dependabot\ListSelectedReposForOrgSecret\Response\ApplicationJson\Ok\Application\Json|Schema\HookDelivery|Schema\TeamDiscussion|Schema\TeamMembership|array{code:int}|Schema\TeamProject|Schema\Artifact|Schema\Job|Schema\SelectedActions|iterable<Schema\RunnerApplication>|Schema\Runner|Schema\WorkflowRun|Schema\ActionsPublicKey|Schema\ActionsSecret|Schema\Workflow|Schema\BranchProtection|iterable<Schema\CheckAnnotation>|Schema\Operations\Checks\ListForSuite\Response\ApplicationJson\Ok|Schema\CodeScanningAlert|Schema\CodeScanningAnalysis|Schema\CodeScanningSarifsStatus|Schema\RepositoryCollaboratorPermission|iterable<Schema\Reaction>|iterable<Schema\BranchShort>|iterable<Schema\CommitComment>|iterable<Schema\PullRequestSimple>|Schema\Operations\Checks\ListForRef\Response\ApplicationJson\Ok\Application\Json|Schema\Operations\Checks\ListSuitesForRef\Response\ApplicationJson\Ok|Schema\CombinedCommitStatus|iterable<Schema\Status>|Schema\BasicError|Schema\DependabotPublicKey|Schema\DependabotSecret|iterable<Schema\DeploymentStatus>|Schema\Operations\Repos\ListDeploymentBranchPolicies\Response\ApplicationJson\Ok|Schema\Blob|Schema\GitCommit|iterable<Schema\GitRef>|Schema\GitRef|Schema\GitTag|Schema\GitTree|Schema\WebhookConfig|iterable<Schema\HookDeliveryItem>|Schema\IssueComment|Schema\IssueEvent|iterable<Schema\IssueComment>|iterable<Schema\LabeledIssueEvent|Schema\UnlabeledIssueEvent|Schema\AssignedIssueEvent|Schema\UnassignedIssueEvent|Schema\MilestonedIssueEvent|Schema\DemilestonedIssueEvent|Schema\RenamedIssueEvent|Schema\ReviewRequestedIssueEvent|Schema\ReviewRequestRemovedIssueEvent|Schema\ReviewDismissedIssueEvent|Schema\LockedIssueEvent|Schema\AddedToProjectIssueEvent|Schema\MovedColumnInProjectIssueEvent|Schema\RemovedFromProjectIssueEvent|Schema\ConvertedNoteToIssueIssueEvent>|iterable<Schema\Label>|Schema\ConvertedNoteToIssueIssueEvent|Schema\TimelineCommentEvent|Schema\TimelineCrossReferencedEvent|Schema\TimelineCommittedEvent|Schema\TimelineReviewedEvent|Schema\TimelineLineCommentedEvent|Schema\TimelineCommitCommentedEvent|Schema\TimelineAssignedIssueEvent|Schema\TimelineUnassignedIssueEvent|Schema\StateChangeIssueEvent>|Schema\PageBuild|Schema\PullRequestReviewComment|iterable<Schema\PullRequestReviewComment>|iterable<Schema\Commit>|iterable<Schema\DiffEntry>|Schema\PullRequestReviewRequest|iterable<Schema\PullRequestReview>|Schema\ReleaseAsset|Schema\Release|iterable<Schema\ReleaseAsset>|Schema\SecretScanningAlert|Schema\TeamDiscussionComment */
    public function call(string $call, array $params, array $pathChunks): Json|Ok|\ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Actions\ListRepoAccessToSelfHostedRunnerGroupInOrg\Response\ApplicationJson\Ok|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Actions\ListSelfHostedRunnersInGroupForOrg\Response\ApplicationJson\Ok\Application\Json|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Actions\ListSelectedReposForOrgSecret\Response\ApplicationJson\Ok|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Dependabot\ListSelectedReposForOrgSecret\Response\ApplicationJson\Ok\Application\Json|HookDelivery|TeamDiscussion|TeamMembership|TeamProject|Artifact|Job|SelectedActions|iterable|Runner|WorkflowRun|ActionsPublicKey|ActionsSecret|Workflow|BranchProtection|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Checks\ListForSuite\Response\ApplicationJson\Ok|CodeScanningAlert|CodeScanningAnalysis|CodeScanningSarifsStatus|RepositoryCollaboratorPermission|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Checks\ListForRef\Response\ApplicationJson\Ok\Application\Json|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Checks\ListSuitesForRef\Response\ApplicationJson\Ok|CombinedCommitStatus|BasicError|DependabotPublicKey|DependabotSecret|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Repos\ListDeploymentBranchPolicies\Response\ApplicationJson\Ok|Blob|GitCommit|GitRef|GitTag|GitTree|WebhookConfig|IssueComment|IssueEvent|PageBuild|PullRequestReviewComment|PullRequestReviewRequest|ReleaseAsset|Release|SecretScanningAlert|TeamDiscussionComment
    {
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'enterprises') {
                if ($pathChunks[2] === '{enterprise}') {
                    if ($pathChunks[3] === 'actions') {
                        if ($pathChunks[4] === 'runner-groups') {
                            if ($pathChunks[5] === '{runner_group_id}') {
                                if ($pathChunks[6] === 'organizations') {
                                    if ($call === 'GET /enterprises/{enterprise}/actions/runner-groups/{runner_group_id}/organizations') {
                                        return $this->routers->internal🔀Router🔀Get🔀EnterpriseAdmin()->listOrgAccessToSelfHostedRunnerGroupInEnterprise($params);
                                    }
                                } elseif ($pathChunks[6] === 'runners') {
                                    if ($call === 'GET /enterprises/{enterprise}/actions/runner-groups/{runner_group_id}/runners') {
                                        return $this->routers->internal🔀Router🔀Get🔀EnterpriseAdmin()->listSelfHostedRunnersInGroupForEnterprise($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'runners') {
                            if ($pathChunks[5] === '{runner_id}') {
                                if ($pathChunks[6] === 'labels') {
                                    if ($call === 'GET /enterprises/{enterprise}/actions/runners/{runner_id}/labels') {
                                        return $this->routers->internal🔀Router🔀Get🔀EnterpriseAdmin()->listLabelsForSelfHostedRunnerForEnterprise($params);
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($pathChunks[3] === 'actions') {
                        if ($pathChunks[4] === 'runner-groups') {
                            if ($pathChunks[5] === '{runner_group_id}') {
                                if ($pathChunks[6] === 'repositories') {
                                    if ($call === 'GET /orgs/{org}/actions/runner-groups/{runner_group_id}/repositories') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->listRepoAccessToSelfHostedRunnerGroupInOrg($params);
                                    }
                                } elseif ($pathChunks[6] === 'runners') {
                                    if ($call === 'GET /orgs/{org}/actions/runner-groups/{runner_group_id}/runners') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->listSelfHostedRunnersInGroupForOrg($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'runners') {
                            if ($pathChunks[5] === '{runner_id}') {
                                if ($pathChunks[6] === 'labels') {
                                    if ($call === 'GET /orgs/{org}/actions/runners/{runner_id}/labels') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->listLabelsForSelfHostedRunnerForOrg($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'secrets') {
                            if ($pathChunks[5] === '{secret_name}') {
                                if ($pathChunks[6] === 'repositories') {
                                    if ($call === 'GET /orgs/{org}/actions/secrets/{secret_name}/repositories') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->listSelectedReposForOrgSecret($params);
                                    }
                                }
                            }
                        }
                    } elseif ($pathChunks[3] === 'dependabot') {
                        if ($pathChunks[4] === 'secrets') {
                            if ($pathChunks[5] === '{secret_name}') {
                                if ($pathChunks[6] === 'repositories') {
                                    if ($call === 'GET /orgs/{org}/dependabot/secrets/{secret_name}/repositories') {
                                        return $this->routers->internal🔀Router🔀Get🔀Dependabot()->listSelectedReposForOrgSecret($params);
                                    }
                                }
                            }
                        }
                    } elseif ($pathChunks[3] === 'hooks') {
                        if ($pathChunks[4] === '{hook_id}') {
                            if ($pathChunks[5] === 'deliveries') {
                                if ($pathChunks[6] === '{delivery_id}') {
                                    if ($call === 'GET /orgs/{org}/hooks/{hook_id}/deliveries/{delivery_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Orgs()->getWebhookDelivery($params);
                                    }
                                }
                            }
                        }
                    } elseif ($pathChunks[3] === 'teams') {
                        if ($pathChunks[4] === '{team_slug}') {
                            if ($pathChunks[5] === 'discussions') {
                                if ($pathChunks[6] === '{discussion_number}') {
                                    if ($call === 'GET /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Teams()->getDiscussionInOrg($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'memberships') {
                                if ($pathChunks[6] === '{username}') {
                                    if ($call === 'GET /orgs/{org}/teams/{team_slug}/memberships/{username}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Teams()->getMembershipForUserInOrg($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'projects') {
                                if ($pathChunks[6] === '{project_id}') {
                                    if ($call === 'GET /orgs/{org}/teams/{team_slug}/projects/{project_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Teams()->checkPermissionsForProjectInOrg($params);
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
                            if ($pathChunks[5] === 'artifacts') {
                                if ($pathChunks[6] === '{artifact_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/artifacts/{artifact_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getArtifact($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'jobs') {
                                if ($pathChunks[6] === '{job_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/jobs/{job_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getJobForWorkflowRun($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'permissions') {
                                if ($pathChunks[6] === 'selected-actions') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/permissions/selected-actions') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getAllowedActionsRepository($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'runners') {
                                if ($pathChunks[6] === 'downloads') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/runners/downloads') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->listRunnerApplicationsForRepo($params);
                                    }
                                } elseif ($pathChunks[6] === '{runner_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/runners/{runner_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getSelfHostedRunnerForRepo($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'runs') {
                                if ($pathChunks[6] === '{run_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/runs/{run_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getWorkflowRun($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'secrets') {
                                if ($pathChunks[6] === 'public-key') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/secrets/public-key') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getRepoPublicKey($params);
                                    }
                                } elseif ($pathChunks[6] === '{secret_name}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/secrets/{secret_name}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getRepoSecret($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'workflows') {
                                if ($pathChunks[6] === '{workflow_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/actions/workflows/{workflow_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getWorkflow($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'branches') {
                            if ($pathChunks[5] === '{branch}') {
                                if ($pathChunks[6] === 'protection') {
                                    if ($call === 'GET /repos/{owner}/{repo}/branches/{branch}/protection') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getBranchProtection($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'check-runs') {
                            if ($pathChunks[5] === '{check_run_id}') {
                                if ($pathChunks[6] === 'annotations') {
                                    if ($call === 'GET /repos/{owner}/{repo}/check-runs/{check_run_id}/annotations') {
                                        return $this->routers->internal🔀Router🔀Get🔀Checks()->listAnnotations($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'check-suites') {
                            if ($pathChunks[5] === '{check_suite_id}') {
                                if ($pathChunks[6] === 'check-runs') {
                                    if ($call === 'GET /repos/{owner}/{repo}/check-suites/{check_suite_id}/check-runs') {
                                        return $this->routers->internal🔀Router🔀Get🔀Checks()->listForSuite($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'code-scanning') {
                            if ($pathChunks[5] === 'alerts') {
                                if ($pathChunks[6] === '{alert_number}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/code-scanning/alerts/{alert_number}') {
                                        return $this->routers->internal🔀Router🔀Get🔀CodeScanning()->getAlert($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'analyses') {
                                if ($pathChunks[6] === '{analysis_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/code-scanning/analyses/{analysis_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀CodeScanning()->getAnalysis($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'sarifs') {
                                if ($pathChunks[6] === '{sarif_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/code-scanning/sarifs/{sarif_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀CodeScanning()->getSarif($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'collaborators') {
                            if ($pathChunks[5] === '{username}') {
                                if ($pathChunks[6] === 'permission') {
                                    if ($call === 'GET /repos/{owner}/{repo}/collaborators/{username}/permission') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getCollaboratorPermissionLevel($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'comments') {
                            if ($pathChunks[5] === '{comment_id}') {
                                if ($pathChunks[6] === 'reactions') {
                                    if ($call === 'GET /repos/{owner}/{repo}/comments/{comment_id}/reactions') {
                                        return $this->routers->internal🔀Router🔀Get🔀Reactions()->listForCommitComment($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'commits') {
                            if ($pathChunks[5] === '{commit_sha}') {
                                if ($pathChunks[6] === 'branches-where-head') {
                                    if ($call === 'GET /repos/{owner}/{repo}/commits/{commit_sha}/branches-where-head') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listBranchesForHeadCommit($params);
                                    }
                                } elseif ($pathChunks[6] === 'comments') {
                                    if ($call === 'GET /repos/{owner}/{repo}/commits/{commit_sha}/comments') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listCommentsForCommit($params);
                                    }
                                } elseif ($pathChunks[6] === 'pulls') {
                                    if ($call === 'GET /repos/{owner}/{repo}/commits/{commit_sha}/pulls') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listPullRequestsAssociatedWithCommit($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === '{ref}') {
                                if ($pathChunks[6] === 'check-runs') {
                                    if ($call === 'GET /repos/{owner}/{repo}/commits/{ref}/check-runs') {
                                        return $this->routers->internal🔀Router🔀Get🔀Checks()->listForRef($params);
                                    }
                                } elseif ($pathChunks[6] === 'check-suites') {
                                    if ($call === 'GET /repos/{owner}/{repo}/commits/{ref}/check-suites') {
                                        return $this->routers->internal🔀Router🔀Get🔀Checks()->listSuitesForRef($params);
                                    }
                                } elseif ($pathChunks[6] === 'status') {
                                    if ($call === 'GET /repos/{owner}/{repo}/commits/{ref}/status') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getCombinedStatusForRef($params);
                                    }
                                } elseif ($pathChunks[6] === 'statuses') {
                                    if ($call === 'GET /repos/{owner}/{repo}/commits/{ref}/statuses') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listCommitStatusesForRef($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'dependabot') {
                            if ($pathChunks[5] === 'secrets') {
                                if ($pathChunks[6] === 'public-key') {
                                    if ($call === 'GET /repos/{owner}/{repo}/dependabot/secrets/public-key') {
                                        return $this->routers->internal🔀Router🔀Get🔀Dependabot()->getRepoPublicKey($params);
                                    }
                                } elseif ($pathChunks[6] === '{secret_name}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/dependabot/secrets/{secret_name}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Dependabot()->getRepoSecret($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'deployments') {
                            if ($pathChunks[5] === '{deployment_id}') {
                                if ($pathChunks[6] === 'statuses') {
                                    if ($call === 'GET /repos/{owner}/{repo}/deployments/{deployment_id}/statuses') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listDeploymentStatuses($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'environments') {
                            if ($pathChunks[5] === '{environment_name}') {
                                if ($pathChunks[6] === 'deployment-branch-policies') {
                                    if ($call === 'GET /repos/{owner}/{repo}/environments/{environment_name}/deployment-branch-policies') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listDeploymentBranchPolicies($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'git') {
                            if ($pathChunks[5] === 'blobs') {
                                if ($pathChunks[6] === '{file_sha}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/git/blobs/{file_sha}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Git()->getBlob($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'commits') {
                                if ($pathChunks[6] === '{commit_sha}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/git/commits/{commit_sha}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Git()->getCommit($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'matching-refs') {
                                if ($pathChunks[6] === '{ref}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/git/matching-refs/{ref}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Git()->listMatchingRefs($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'ref') {
                                if ($pathChunks[6] === '{ref}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/git/ref/{ref}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Git()->getRef($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'tags') {
                                if ($pathChunks[6] === '{tag_sha}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/git/tags/{tag_sha}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Git()->getTag($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'trees') {
                                if ($pathChunks[6] === '{tree_sha}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/git/trees/{tree_sha}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Git()->getTree($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'hooks') {
                            if ($pathChunks[5] === '{hook_id}') {
                                if ($pathChunks[6] === 'config') {
                                    if ($call === 'GET /repos/{owner}/{repo}/hooks/{hook_id}/config') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getWebhookConfigForRepo($params);
                                    }
                                } elseif ($pathChunks[6] === 'deliveries') {
                                    if ($call === 'GET /repos/{owner}/{repo}/hooks/{hook_id}/deliveries') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listWebhookDeliveries($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'issues') {
                            if ($pathChunks[5] === 'comments') {
                                if ($pathChunks[6] === '{comment_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/issues/comments/{comment_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Issues()->getComment($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'events') {
                                if ($pathChunks[6] === '{event_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/issues/events/{event_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Issues()->getEvent($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === '{issue_number}') {
                                if ($pathChunks[6] === 'comments') {
                                    if ($call === 'GET /repos/{owner}/{repo}/issues/{issue_number}/comments') {
                                        return $this->routers->internal🔀Router🔀Get🔀Issues()->listComments($params);
                                    }
                                } elseif ($pathChunks[6] === 'events') {
                                    if ($call === 'GET /repos/{owner}/{repo}/issues/{issue_number}/events') {
                                        return $this->routers->internal🔀Router🔀Get🔀Issues()->listEvents($params);
                                    }
                                } elseif ($pathChunks[6] === 'labels') {
                                    if ($call === 'GET /repos/{owner}/{repo}/issues/{issue_number}/labels') {
                                        return $this->routers->internal🔀Router🔀Get🔀Issues()->listLabelsOnIssue($params);
                                    }
                                } elseif ($pathChunks[6] === 'reactions') {
                                    if ($call === 'GET /repos/{owner}/{repo}/issues/{issue_number}/reactions') {
                                        return $this->routers->internal🔀Router🔀Get🔀Reactions()->listForIssue($params);
                                    }
                                } elseif ($pathChunks[6] === 'timeline') {
                                    if ($call === 'GET /repos/{owner}/{repo}/issues/{issue_number}/timeline') {
                                        return $this->routers->internal🔀Router🔀Get🔀Issues()->listEventsForTimeline($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'milestones') {
                            if ($pathChunks[5] === '{milestone_number}') {
                                if ($pathChunks[6] === 'labels') {
                                    if ($call === 'GET /repos/{owner}/{repo}/milestones/{milestone_number}/labels') {
                                        return $this->routers->internal🔀Router🔀Get🔀Issues()->listLabelsForMilestone($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'pages') {
                            if ($pathChunks[5] === 'builds') {
                                if ($pathChunks[6] === 'latest') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pages/builds/latest') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getLatestPagesBuild($params);
                                    }
                                } elseif ($pathChunks[6] === '{build_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pages/builds/{build_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getPagesBuild($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'pulls') {
                            if ($pathChunks[5] === 'comments') {
                                if ($pathChunks[6] === '{comment_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pulls/comments/{comment_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Pulls()->getReviewComment($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === '{pull_number}') {
                                if ($pathChunks[6] === 'comments') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pulls/{pull_number}/comments') {
                                        return $this->routers->internal🔀Router🔀Get🔀Pulls()->listReviewComments($params);
                                    }
                                } elseif ($pathChunks[6] === 'commits') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pulls/{pull_number}/commits') {
                                        return $this->routers->internal🔀Router🔀Get🔀Pulls()->listCommits($params);
                                    }
                                } elseif ($pathChunks[6] === 'files') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pulls/{pull_number}/files') {
                                        return $this->routers->internal🔀Router🔀Get🔀Pulls()->listFiles($params);
                                    }
                                } elseif ($pathChunks[6] === 'merge') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pulls/{pull_number}/merge') {
                                        return $this->routers->internal🔀Router🔀Get🔀Pulls()->checkIfMerged($params);
                                    }
                                } elseif ($pathChunks[6] === 'requested_reviewers') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pulls/{pull_number}/requested_reviewers') {
                                        return $this->routers->internal🔀Router🔀Get🔀Pulls()->listRequestedReviewers($params);
                                    }
                                } elseif ($pathChunks[6] === 'reviews') {
                                    if ($call === 'GET /repos/{owner}/{repo}/pulls/{pull_number}/reviews') {
                                        return $this->routers->internal🔀Router🔀Get🔀Pulls()->listReviews($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'releases') {
                            if ($pathChunks[5] === 'assets') {
                                if ($pathChunks[6] === '{asset_id}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/releases/assets/{asset_id}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getReleaseAsset($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === 'tags') {
                                if ($pathChunks[6] === '{tag}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/releases/tags/{tag}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->getReleaseByTag($params);
                                    }
                                }
                            } elseif ($pathChunks[5] === '{release_id}') {
                                if ($pathChunks[6] === 'assets') {
                                    if ($call === 'GET /repos/{owner}/{repo}/releases/{release_id}/assets') {
                                        return $this->routers->internal🔀Router🔀Get🔀Repos()->listReleaseAssets($params);
                                    }
                                } elseif ($pathChunks[6] === 'reactions') {
                                    if ($call === 'GET /repos/{owner}/{repo}/releases/{release_id}/reactions') {
                                        return $this->routers->internal🔀Router🔀Get🔀Reactions()->listForRelease($params);
                                    }
                                }
                            }
                        } elseif ($pathChunks[4] === 'secret-scanning') {
                            if ($pathChunks[5] === 'alerts') {
                                if ($pathChunks[6] === '{alert_number}') {
                                    if ($call === 'GET /repos/{owner}/{repo}/secret-scanning/alerts/{alert_number}') {
                                        return $this->routers->internal🔀Router🔀Get🔀SecretScanning()->getAlert($params);
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
                            if ($pathChunks[5] === 'secrets') {
                                if ($pathChunks[6] === 'public-key') {
                                    if ($call === 'GET /repositories/{repository_id}/environments/{environment_name}/secrets/public-key') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getEnvironmentPublicKey($params);
                                    }
                                } elseif ($pathChunks[6] === '{secret_name}') {
                                    if ($call === 'GET /repositories/{repository_id}/environments/{environment_name}/secrets/{secret_name}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Actions()->getEnvironmentSecret($params);
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
                                    if ($call === 'GET /teams/{team_id}/discussions/{discussion_number}/comments/{comment_number}') {
                                        return $this->routers->internal🔀Router🔀Get🔀Teams()->getDiscussionCommentLegacy($params);
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
