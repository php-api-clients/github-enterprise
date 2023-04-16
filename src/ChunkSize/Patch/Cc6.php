<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\ChunkSize\Patch;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class Cc6
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
                if ($pathChunks[2] == 'ldap') {
                    if ($pathChunks[3] == 'teams') {
                        if ($pathChunks[4] == '{team_id}') {
                            if ($pathChunks[5] == 'mapping') {
                                if ($call == 'PATCH /admin/ldap/teams/{team_id}/mapping') {
                                    if (\array_key_exists(Router\Patch\EnterpriseAdmin::class, $this->router) == false) {
                                        $this->router[Router\Patch\EnterpriseAdmin::class] = new Router\Patch\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\EnterpriseAdmin::class]->updateLdapMappingForTeam($params);
                                }
                            }
                        }
                    } elseif ($pathChunks[3] == 'users') {
                        if ($pathChunks[4] == '{username}') {
                            if ($pathChunks[5] == 'mapping') {
                                if ($call == 'PATCH /admin/ldap/users/{username}/mapping') {
                                    if (\array_key_exists(Router\Patch\EnterpriseAdmin::class, $this->router) == false) {
                                        $this->router[Router\Patch\EnterpriseAdmin::class] = new Router\Patch\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\EnterpriseAdmin::class]->updateLdapMappingForUser($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'enterprises') {
                if ($pathChunks[2] == '{enterprise}') {
                    if ($pathChunks[3] == 'actions') {
                        if ($pathChunks[4] == 'runner-groups') {
                            if ($pathChunks[5] == '{runner_group_id}') {
                                if ($call == 'PATCH /enterprises/{enterprise}/actions/runner-groups/{runner_group_id}') {
                                    if (\array_key_exists(Router\Patch\EnterpriseAdmin::class, $this->router) == false) {
                                        $this->router[Router\Patch\EnterpriseAdmin::class] = new Router\Patch\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\EnterpriseAdmin::class]->updateSelfHostedRunnerGroupForEnterprise($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'orgs') {
                if ($pathChunks[2] == '{org}') {
                    if ($pathChunks[3] == 'actions') {
                        if ($pathChunks[4] == 'runner-groups') {
                            if ($pathChunks[5] == '{runner_group_id}') {
                                if ($call == 'PATCH /orgs/{org}/actions/runner-groups/{runner_group_id}') {
                                    if (\array_key_exists(Router\Patch\Actions::class, $this->router) == false) {
                                        $this->router[Router\Patch\Actions::class] = new Router\Patch\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Actions::class]->updateSelfHostedRunnerGroupForOrg($params);
                                }
                            }
                        }
                    } elseif ($pathChunks[3] == 'hooks') {
                        if ($pathChunks[4] == '{hook_id}') {
                            if ($pathChunks[5] == 'config') {
                                if ($call == 'PATCH /orgs/{org}/hooks/{hook_id}/config') {
                                    if (\array_key_exists(Router\Patch\Orgs::class, $this->router) == false) {
                                        $this->router[Router\Patch\Orgs::class] = new Router\Patch\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Orgs::class]->updateWebhookConfigForOrg($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'repos') {
                if ($pathChunks[2] == '{owner}') {
                    if ($pathChunks[3] == '{repo}') {
                        if ($pathChunks[4] == 'check-runs') {
                            if ($pathChunks[5] == '{check_run_id}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/check-runs/{check_run_id}') {
                                    if (\array_key_exists(Router\Patch\Checks::class, $this->router) == false) {
                                        $this->router[Router\Patch\Checks::class] = new Router\Patch\Checks($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Checks::class]->update($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'check-suites') {
                            if ($pathChunks[5] == 'preferences') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/check-suites/preferences') {
                                    if (\array_key_exists(Router\Patch\Checks::class, $this->router) == false) {
                                        $this->router[Router\Patch\Checks::class] = new Router\Patch\Checks($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Checks::class]->setSuitesPreferences($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'comments') {
                            if ($pathChunks[5] == '{comment_id}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/comments/{comment_id}') {
                                    if (\array_key_exists(Router\Patch\Repos::class, $this->router) == false) {
                                        $this->router[Router\Patch\Repos::class] = new Router\Patch\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Repos::class]->updateCommitComment($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'hooks') {
                            if ($pathChunks[5] == '{hook_id}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/hooks/{hook_id}') {
                                    if (\array_key_exists(Router\Patch\Repos::class, $this->router) == false) {
                                        $this->router[Router\Patch\Repos::class] = new Router\Patch\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Repos::class]->updateWebhook($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'invitations') {
                            if ($pathChunks[5] == '{invitation_id}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/invitations/{invitation_id}') {
                                    if (\array_key_exists(Router\Patch\Repos::class, $this->router) == false) {
                                        $this->router[Router\Patch\Repos::class] = new Router\Patch\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Repos::class]->updateInvitation($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'issues') {
                            if ($pathChunks[5] == '{issue_number}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/issues/{issue_number}') {
                                    if (\array_key_exists(Router\Patch\Issues::class, $this->router) == false) {
                                        $this->router[Router\Patch\Issues::class] = new Router\Patch\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Issues::class]->update($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'labels') {
                            if ($pathChunks[5] == '{name}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/labels/{name}') {
                                    if (\array_key_exists(Router\Patch\Issues::class, $this->router) == false) {
                                        $this->router[Router\Patch\Issues::class] = new Router\Patch\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Issues::class]->updateLabel($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'milestones') {
                            if ($pathChunks[5] == '{milestone_number}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/milestones/{milestone_number}') {
                                    if (\array_key_exists(Router\Patch\Issues::class, $this->router) == false) {
                                        $this->router[Router\Patch\Issues::class] = new Router\Patch\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Issues::class]->updateMilestone($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'pre-receive-hooks') {
                            if ($pathChunks[5] == '{pre_receive_hook_id}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/pre-receive-hooks/{pre_receive_hook_id}') {
                                    if (\array_key_exists(Router\Patch\EnterpriseAdmin::class, $this->router) == false) {
                                        $this->router[Router\Patch\EnterpriseAdmin::class] = new Router\Patch\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\EnterpriseAdmin::class]->updatePreReceiveHookEnforcementForRepo($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'pulls') {
                            if ($pathChunks[5] == '{pull_number}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/pulls/{pull_number}') {
                                    if (\array_key_exists(Router\Patch\Pulls::class, $this->router) == false) {
                                        $this->router[Router\Patch\Pulls::class] = new Router\Patch\Pulls($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Pulls::class]->update($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'releases') {
                            if ($pathChunks[5] == '{release_id}') {
                                if ($call == 'PATCH /repos/{owner}/{repo}/releases/{release_id}') {
                                    if (\array_key_exists(Router\Patch\Repos::class, $this->router) == false) {
                                        $this->router[Router\Patch\Repos::class] = new Router\Patch\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Patch\Repos::class]->updateRelease($params);
                                }
                            }
                        }
                    }
                }
            }
        }
        throw new \InvalidArgumentException();
    }
}
