<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Post;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\Schema\AuthenticationToken;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningSarifsReceipt;
use ApiClients\Client\GitHubEnterprise\Schema\GitCommit;
use ApiClients\Client\GitHubEnterprise\Schema\GitRef;
use ApiClients\Client\GitHubEnterprise\Schema\GitTag;
use ApiClients\Client\GitHubEnterprise\Schema\GitTree;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\SyncLdapMappingForTeam\Response\ApplicationJson\Created;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\SyncLdapMappingForUser\Response\ApplicationJson\Created\Application\Json;
use ApiClients\Client\GitHubEnterprise\Schema\PageBuildStatus;
use ApiClients\Client\GitHubEnterprise\Schema\Reaction;
use ApiClients\Client\GitHubEnterprise\Schema\ReleaseNotesContent;
use ApiClients\Client\GitHubEnterprise\Schema\ShortBlob;
use ApiClients\Client\GitHubEnterprise\Schema\Status;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussion;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussionComment;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Six
{
    private array $router = [];

    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return |array{code: int}|(Schema\Operations\Projects\MoveCard\Response\ApplicationJson\Created\Application\Json|array{code: int})|(Schema\CodeScanningSarifsReceipt */
    public function call(string $call, array $params, array $pathChunks): Created|Json|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Apps\RedeliverWebhookDelivery\Response\ApplicationJson\Accepted\Application\Json|AuthenticationToken|TeamDiscussion|\ApiClients\Client\GitHubEnterprise\Schema\Operations\Projects\MoveCard\Response\ApplicationJson\Created\Application\Json|CodeScanningSarifsReceipt|ShortBlob|GitCommit|GitRef|GitTag|GitTree|PageBuildStatus|ReleaseNotesContent|Status|TeamDiscussionComment|Reaction|array
    {
        $matched = false;
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'admin') {
                if ($pathChunks[2] === 'ldap') {
                    if ($pathChunks[3] === 'teams') {
                        if ($pathChunks[4] === '{team_id}') {
                            if ($pathChunks[5] === 'sync') {
                                if ($call === 'POST /admin/ldap/teams/{team_id}/sync') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\EnterpriseAdmin::class, $this->router) === false) {
                                        $this->router[Router\Post\EnterpriseAdmin::class] = new Router\Post\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\EnterpriseAdmin::class]->SyncLdapMappingForTeam($params);
                                }
                            }
                        }
                    } elseif ($pathChunks[3] === 'users') {
                        if ($pathChunks[4] === '{username}') {
                            if ($pathChunks[5] === 'sync') {
                                if ($call === 'POST /admin/ldap/users/{username}/sync') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\EnterpriseAdmin::class, $this->router) === false) {
                                        $this->router[Router\Post\EnterpriseAdmin::class] = new Router\Post\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\EnterpriseAdmin::class]->SyncLdapMappingForUser($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'app') {
                if ($pathChunks[2] === 'hook') {
                    if ($pathChunks[3] === 'deliveries') {
                        if ($pathChunks[4] === '{delivery_id}') {
                            if ($pathChunks[5] === 'attempts') {
                                if ($call === 'POST /app/hook/deliveries/{delivery_id}/attempts') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Apps::class, $this->router) === false) {
                                        $this->router[Router\Post\Apps::class] = new Router\Post\Apps($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Apps::class]->RedeliverWebhookDelivery($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'enterprises') {
                if ($pathChunks[2] === '{enterprise}') {
                    if ($pathChunks[3] === 'actions') {
                        if ($pathChunks[4] === 'runners') {
                            if ($pathChunks[5] === 'registration-token') {
                                if ($call === 'POST /enterprises/{enterprise}/actions/runners/registration-token') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\EnterpriseAdmin::class, $this->router) === false) {
                                        $this->router[Router\Post\EnterpriseAdmin::class] = new Router\Post\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\EnterpriseAdmin::class]->CreateRegistrationTokenForEnterprise($params);
                                }
                            } elseif ($pathChunks[5] === 'remove-token') {
                                if ($call === 'POST /enterprises/{enterprise}/actions/runners/remove-token') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\EnterpriseAdmin::class, $this->router) === false) {
                                        $this->router[Router\Post\EnterpriseAdmin::class] = new Router\Post\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\EnterpriseAdmin::class]->CreateRemoveTokenForEnterprise($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($pathChunks[3] === 'actions') {
                        if ($pathChunks[4] === 'runners') {
                            if ($pathChunks[5] === 'registration-token') {
                                if ($call === 'POST /orgs/{org}/actions/runners/registration-token') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Actions::class, $this->router) === false) {
                                        $this->router[Router\Post\Actions::class] = new Router\Post\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Actions::class]->CreateRegistrationTokenForOrg($params);
                                }
                            } elseif ($pathChunks[5] === 'remove-token') {
                                if ($call === 'POST /orgs/{org}/actions/runners/remove-token') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Actions::class, $this->router) === false) {
                                        $this->router[Router\Post\Actions::class] = new Router\Post\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Actions::class]->CreateRemoveTokenForOrg($params);
                                }
                            }
                        }
                    } elseif ($pathChunks[3] === 'hooks') {
                        if ($pathChunks[4] === '{hook_id}') {
                            if ($pathChunks[5] === 'pings') {
                                if ($call === 'POST /orgs/{org}/hooks/{hook_id}/pings') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Orgs::class, $this->router) === false) {
                                        $this->router[Router\Post\Orgs::class] = new Router\Post\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Orgs::class]->PingWebhook($params);
                                }
                            }
                        }
                    } elseif ($pathChunks[3] === 'teams') {
                        if ($pathChunks[4] === '{team_slug}') {
                            if ($pathChunks[5] === 'discussions') {
                                if ($call === 'POST /orgs/{org}/teams/{team_slug}/discussions') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Teams::class, $this->router) === false) {
                                        $this->router[Router\Post\Teams::class] = new Router\Post\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Teams::class]->CreateDiscussionInOrg($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'projects') {
                if ($pathChunks[2] === 'columns') {
                    if ($pathChunks[3] === 'cards') {
                        if ($pathChunks[4] === '{card_id}') {
                            if ($pathChunks[5] === 'moves') {
                                if ($call === 'POST /projects/columns/cards/{card_id}/moves') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Projects::class, $this->router) === false) {
                                        $this->router[Router\Post\Projects::class] = new Router\Post\Projects($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Projects::class]->MoveCard($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'repos') {
                if ($pathChunks[2] === '{owner}') {
                    if ($pathChunks[3] === '{repo}') {
                        if ($pathChunks[4] === 'code-scanning') {
                            if ($pathChunks[5] === 'sarifs') {
                                if ($call === 'POST /repos/{owner}/{repo}/code-scanning/sarifs') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\CodeScanning::class, $this->router) === false) {
                                        $this->router[Router\Post\CodeScanning::class] = new Router\Post\CodeScanning($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\CodeScanning::class]->UploadSarif($params);
                                }
                            }
                        } elseif ($pathChunks[4] === 'git') {
                            if ($pathChunks[5] === 'blobs') {
                                if ($call === 'POST /repos/{owner}/{repo}/git/blobs') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Git::class, $this->router) === false) {
                                        $this->router[Router\Post\Git::class] = new Router\Post\Git($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Git::class]->CreateBlob($params);
                                }
                            } elseif ($pathChunks[5] === 'commits') {
                                if ($call === 'POST /repos/{owner}/{repo}/git/commits') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Git::class, $this->router) === false) {
                                        $this->router[Router\Post\Git::class] = new Router\Post\Git($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Git::class]->CreateCommit($params);
                                }
                            } elseif ($pathChunks[5] === 'refs') {
                                if ($call === 'POST /repos/{owner}/{repo}/git/refs') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Git::class, $this->router) === false) {
                                        $this->router[Router\Post\Git::class] = new Router\Post\Git($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Git::class]->CreateRef($params);
                                }
                            } elseif ($pathChunks[5] === 'tags') {
                                if ($call === 'POST /repos/{owner}/{repo}/git/tags') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Git::class, $this->router) === false) {
                                        $this->router[Router\Post\Git::class] = new Router\Post\Git($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Git::class]->CreateTag($params);
                                }
                            } elseif ($pathChunks[5] === 'trees') {
                                if ($call === 'POST /repos/{owner}/{repo}/git/trees') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Git::class, $this->router) === false) {
                                        $this->router[Router\Post\Git::class] = new Router\Post\Git($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Git::class]->CreateTree($params);
                                }
                            }
                        } elseif ($pathChunks[4] === 'pages') {
                            if ($pathChunks[5] === 'builds') {
                                if ($call === 'POST /repos/{owner}/{repo}/pages/builds') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                        $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Repos::class]->RequestPagesBuild($params);
                                }
                            }
                        } elseif ($pathChunks[4] === 'releases') {
                            if ($pathChunks[5] === 'generate-notes') {
                                if ($call === 'POST /repos/{owner}/{repo}/releases/generate-notes') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                        $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Repos::class]->GenerateReleaseNotes($params);
                                }
                            }
                        } elseif ($pathChunks[4] === 'statuses') {
                            if ($pathChunks[5] === '{sha}') {
                                if ($call === 'POST /repos/{owner}/{repo}/statuses/{sha}') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Repos::class, $this->router) === false) {
                                        $this->router[Router\Post\Repos::class] = new Router\Post\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Repos::class]->CreateCommitStatus($params);
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
                                if ($call === 'POST /teams/{team_id}/discussions/{discussion_number}/comments') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Teams::class, $this->router) === false) {
                                        $this->router[Router\Post\Teams::class] = new Router\Post\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Teams::class]->CreateDiscussionCommentLegacy($params);
                                }
                            } elseif ($pathChunks[5] === 'reactions') {
                                if ($call === 'POST /teams/{team_id}/discussions/{discussion_number}/reactions') {
                                    $matched = true;
                                    if (array_key_exists(Router\Post\Reactions::class, $this->router) === false) {
                                        $this->router[Router\Post\Reactions::class] = new Router\Post\Reactions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }

                                    return $this->router[Router\Post\Reactions::class]->CreateForTeamDiscussionLegacy($params);
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
