<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\ChunkSize\Delete;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class Cc5
{
    private array $router = array();
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly \ApiClients\Client\GitHubEnterprise\Hydrators $hydrators;
    private readonly \React\Http\Browser $browser;
    private readonly \ApiClients\Contracts\HTTP\Headers\AuthenticationInterface $authentication;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, \ApiClients\Client\GitHubEnterprise\Hydrators $hydrators, \React\Http\Browser $browser, \ApiClients\Contracts\HTTP\Headers\AuthenticationInterface $authentication)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrators = $hydrators;
        $this->browser = $browser;
        $this->authentication = $authentication;
    }
    public function call(string $call, array $params, array $pathChunks)
    {
        if ($pathChunks[0] == '') {
            if ($pathChunks[1] == 'admin') {
                if ($pathChunks[2] == 'users') {
                    if ($pathChunks[3] == '{username}') {
                        if ($pathChunks[4] == 'authorizations') {
                            if ($call == 'DELETE /admin/users/{username}/authorizations') {
                                if (\array_key_exists(Router\Delete\EnterpriseAdmin::class, $this->router) == false) {
                                    $this->router[Router\Delete\EnterpriseAdmin::class] = new Router\Delete\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\EnterpriseAdmin::class]->deleteImpersonationOAuthToken($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'app') {
                if ($pathChunks[2] == 'installations') {
                    if ($pathChunks[3] == '{installation_id}') {
                        if ($pathChunks[4] == 'suspended') {
                            if ($call == 'DELETE /app/installations/{installation_id}/suspended') {
                                if (\array_key_exists(Router\Delete\Apps::class, $this->router) == false) {
                                    $this->router[Router\Delete\Apps::class] = new Router\Delete\Apps($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Apps::class]->unsuspendInstallation($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'applications') {
                if ($pathChunks[2] == '{client_id}') {
                    if ($pathChunks[3] == 'grants') {
                        if ($pathChunks[4] == '{access_token}') {
                            if ($call == 'DELETE /applications/{client_id}/grants/{access_token}') {
                                if (\array_key_exists(Router\Delete\Apps::class, $this->router) == false) {
                                    $this->router[Router\Delete\Apps::class] = new Router\Delete\Apps($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Apps::class]->revokeGrantForApplication($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'tokens') {
                        if ($pathChunks[4] == '{access_token}') {
                            if ($call == 'DELETE /applications/{client_id}/tokens/{access_token}') {
                                if (\array_key_exists(Router\Delete\Apps::class, $this->router) == false) {
                                    $this->router[Router\Delete\Apps::class] = new Router\Delete\Apps($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Apps::class]->revokeAuthorizationForApplication($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'gists') {
                if ($pathChunks[2] == '{gist_id}') {
                    if ($pathChunks[3] == 'comments') {
                        if ($pathChunks[4] == '{comment_id}') {
                            if ($call == 'DELETE /gists/{gist_id}/comments/{comment_id}') {
                                if (\array_key_exists(Router\Delete\Gists::class, $this->router) == false) {
                                    $this->router[Router\Delete\Gists::class] = new Router\Delete\Gists($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Gists::class]->deleteComment($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'notifications') {
                if ($pathChunks[2] == 'threads') {
                    if ($pathChunks[3] == '{thread_id}') {
                        if ($pathChunks[4] == 'subscription') {
                            if ($call == 'DELETE /notifications/threads/{thread_id}/subscription') {
                                if (\array_key_exists(Router\Delete\Activity::class, $this->router) == false) {
                                    $this->router[Router\Delete\Activity::class] = new Router\Delete\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Activity::class]->deleteThreadSubscription($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'orgs') {
                if ($pathChunks[2] == '{org}') {
                    if ($pathChunks[3] == 'hooks') {
                        if ($pathChunks[4] == '{hook_id}') {
                            if ($call == 'DELETE /orgs/{org}/hooks/{hook_id}') {
                                if (\array_key_exists(Router\Delete\Orgs::class, $this->router) == false) {
                                    $this->router[Router\Delete\Orgs::class] = new Router\Delete\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Orgs::class]->deleteWebhook($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'members') {
                        if ($pathChunks[4] == '{username}') {
                            if ($call == 'DELETE /orgs/{org}/members/{username}') {
                                if (\array_key_exists(Router\Delete\Orgs::class, $this->router) == false) {
                                    $this->router[Router\Delete\Orgs::class] = new Router\Delete\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Orgs::class]->removeMember($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'memberships') {
                        if ($pathChunks[4] == '{username}') {
                            if ($call == 'DELETE /orgs/{org}/memberships/{username}') {
                                if (\array_key_exists(Router\Delete\Orgs::class, $this->router) == false) {
                                    $this->router[Router\Delete\Orgs::class] = new Router\Delete\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Orgs::class]->removeMembershipForUser($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'outside_collaborators') {
                        if ($pathChunks[4] == '{username}') {
                            if ($call == 'DELETE /orgs/{org}/outside_collaborators/{username}') {
                                if (\array_key_exists(Router\Delete\Orgs::class, $this->router) == false) {
                                    $this->router[Router\Delete\Orgs::class] = new Router\Delete\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Orgs::class]->removeOutsideCollaborator($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'pre-receive-hooks') {
                        if ($pathChunks[4] == '{pre_receive_hook_id}') {
                            if ($call == 'DELETE /orgs/{org}/pre-receive-hooks/{pre_receive_hook_id}') {
                                if (\array_key_exists(Router\Delete\EnterpriseAdmin::class, $this->router) == false) {
                                    $this->router[Router\Delete\EnterpriseAdmin::class] = new Router\Delete\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\EnterpriseAdmin::class]->removePreReceiveHookEnforcementForOrg($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'public_members') {
                        if ($pathChunks[4] == '{username}') {
                            if ($call == 'DELETE /orgs/{org}/public_members/{username}') {
                                if (\array_key_exists(Router\Delete\Orgs::class, $this->router) == false) {
                                    $this->router[Router\Delete\Orgs::class] = new Router\Delete\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Orgs::class]->removePublicMembershipForAuthenticatedUser($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'teams') {
                        if ($pathChunks[4] == '{team_slug}') {
                            if ($call == 'DELETE /orgs/{org}/teams/{team_slug}') {
                                if (\array_key_exists(Router\Delete\Teams::class, $this->router) == false) {
                                    $this->router[Router\Delete\Teams::class] = new Router\Delete\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Teams::class]->deleteInOrg($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'projects') {
                if ($pathChunks[2] == 'columns') {
                    if ($pathChunks[3] == 'cards') {
                        if ($pathChunks[4] == '{card_id}') {
                            if ($call == 'DELETE /projects/columns/cards/{card_id}') {
                                if (\array_key_exists(Router\Delete\Projects::class, $this->router) == false) {
                                    $this->router[Router\Delete\Projects::class] = new Router\Delete\Projects($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Projects::class]->deleteCard($params);
                            }
                        }
                    }
                } elseif ($pathChunks[2] == '{project_id}') {
                    if ($pathChunks[3] == 'collaborators') {
                        if ($pathChunks[4] == '{username}') {
                            if ($call == 'DELETE /projects/{project_id}/collaborators/{username}') {
                                if (\array_key_exists(Router\Delete\Projects::class, $this->router) == false) {
                                    $this->router[Router\Delete\Projects::class] = new Router\Delete\Projects($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Projects::class]->removeCollaborator($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'repos') {
                if ($pathChunks[2] == '{owner}') {
                    if ($pathChunks[3] == '{repo}') {
                        if ($pathChunks[4] == 'lfs') {
                            if ($call == 'DELETE /repos/{owner}/{repo}/lfs') {
                                if (\array_key_exists(Router\Delete\Repos::class, $this->router) == false) {
                                    $this->router[Router\Delete\Repos::class] = new Router\Delete\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Repos::class]->disableLfsForRepo($params);
                            }
                        } elseif ($pathChunks[4] == 'pages') {
                            if ($call == 'DELETE /repos/{owner}/{repo}/pages') {
                                if (\array_key_exists(Router\Delete\Repos::class, $this->router) == false) {
                                    $this->router[Router\Delete\Repos::class] = new Router\Delete\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Repos::class]->deletePagesSite($params);
                            }
                        } elseif ($pathChunks[4] == 'subscription') {
                            if ($call == 'DELETE /repos/{owner}/{repo}/subscription') {
                                if (\array_key_exists(Router\Delete\Activity::class, $this->router) == false) {
                                    $this->router[Router\Delete\Activity::class] = new Router\Delete\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Activity::class]->deleteRepoSubscription($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'setup') {
                if ($pathChunks[2] == 'api') {
                    if ($pathChunks[3] == 'settings') {
                        if ($pathChunks[4] == 'authorized-keys') {
                            if ($call == 'DELETE /setup/api/settings/authorized-keys') {
                                if (\array_key_exists(Router\Delete\EnterpriseAdmin::class, $this->router) == false) {
                                    $this->router[Router\Delete\EnterpriseAdmin::class] = new Router\Delete\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\EnterpriseAdmin::class]->removeAuthorizedSshKey($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'teams') {
                if ($pathChunks[2] == '{team_id}') {
                    if ($pathChunks[3] == 'discussions') {
                        if ($pathChunks[4] == '{discussion_number}') {
                            if ($call == 'DELETE /teams/{team_id}/discussions/{discussion_number}') {
                                if (\array_key_exists(Router\Delete\Teams::class, $this->router) == false) {
                                    $this->router[Router\Delete\Teams::class] = new Router\Delete\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Teams::class]->deleteDiscussionLegacy($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'members') {
                        if ($pathChunks[4] == '{username}') {
                            if ($call == 'DELETE /teams/{team_id}/members/{username}') {
                                if (\array_key_exists(Router\Delete\Teams::class, $this->router) == false) {
                                    $this->router[Router\Delete\Teams::class] = new Router\Delete\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Teams::class]->removeMemberLegacy($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'memberships') {
                        if ($pathChunks[4] == '{username}') {
                            if ($call == 'DELETE /teams/{team_id}/memberships/{username}') {
                                if (\array_key_exists(Router\Delete\Teams::class, $this->router) == false) {
                                    $this->router[Router\Delete\Teams::class] = new Router\Delete\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Teams::class]->removeMembershipForUserLegacy($params);
                            }
                        }
                    } elseif ($pathChunks[3] == 'projects') {
                        if ($pathChunks[4] == '{project_id}') {
                            if ($call == 'DELETE /teams/{team_id}/projects/{project_id}') {
                                if (\array_key_exists(Router\Delete\Teams::class, $this->router) == false) {
                                    $this->router[Router\Delete\Teams::class] = new Router\Delete\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Teams::class]->removeProjectLegacy($params);
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'user') {
                if ($pathChunks[2] == 'starred') {
                    if ($pathChunks[3] == '{owner}') {
                        if ($pathChunks[4] == '{repo}') {
                            if ($call == 'DELETE /user/starred/{owner}/{repo}') {
                                if (\array_key_exists(Router\Delete\Activity::class, $this->router) == false) {
                                    $this->router[Router\Delete\Activity::class] = new Router\Delete\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                }
                                return $this->router[Router\Delete\Activity::class]->unstarRepoForAuthenticatedUser($params);
                            }
                        }
                    }
                }
            }
        }
        throw new \InvalidArgumentException();
    }
}
