<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\ChunkSize\Put;

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
            if ($pathChunks[1] == 'enterprises') {
                if ($pathChunks[2] == '{enterprise}') {
                    if ($pathChunks[3] == 'actions') {
                        if ($pathChunks[4] == 'permissions') {
                            if ($pathChunks[5] == 'organizations') {
                                if ($call == 'PUT /enterprises/{enterprise}/actions/permissions/organizations') {
                                    if (\array_key_exists(Router\Put\EnterpriseAdmin::class, $this->router) == false) {
                                        $this->router[Router\Put\EnterpriseAdmin::class] = new Router\Put\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\EnterpriseAdmin::class]->setSelectedOrganizationsEnabledGithubActionsEnterprise($params);
                                }
                            } elseif ($pathChunks[5] == 'selected-actions') {
                                if ($call == 'PUT /enterprises/{enterprise}/actions/permissions/selected-actions') {
                                    if (\array_key_exists(Router\Put\EnterpriseAdmin::class, $this->router) == false) {
                                        $this->router[Router\Put\EnterpriseAdmin::class] = new Router\Put\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\EnterpriseAdmin::class]->setAllowedActionsEnterprise($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'orgs') {
                if ($pathChunks[2] == '{org}') {
                    if ($pathChunks[3] == 'actions') {
                        if ($pathChunks[4] == 'permissions') {
                            if ($pathChunks[5] == 'repositories') {
                                if ($call == 'PUT /orgs/{org}/actions/permissions/repositories') {
                                    if (\array_key_exists(Router\Put\Actions::class, $this->router) == false) {
                                        $this->router[Router\Put\Actions::class] = new Router\Put\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Actions::class]->setSelectedRepositoriesEnabledGithubActionsOrganization($params);
                                }
                            } elseif ($pathChunks[5] == 'selected-actions') {
                                if ($call == 'PUT /orgs/{org}/actions/permissions/selected-actions') {
                                    if (\array_key_exists(Router\Put\Actions::class, $this->router) == false) {
                                        $this->router[Router\Put\Actions::class] = new Router\Put\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Actions::class]->setAllowedActionsOrganization($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'secrets') {
                            if ($pathChunks[5] == '{secret_name}') {
                                if ($call == 'PUT /orgs/{org}/actions/secrets/{secret_name}') {
                                    if (\array_key_exists(Router\Put\Actions::class, $this->router) == false) {
                                        $this->router[Router\Put\Actions::class] = new Router\Put\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Actions::class]->createOrUpdateOrgSecret($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'repos') {
                if ($pathChunks[2] == '{owner}') {
                    if ($pathChunks[3] == '{repo}') {
                        if ($pathChunks[4] == 'actions') {
                            if ($pathChunks[5] == 'permissions') {
                                if ($call == 'PUT /repos/{owner}/{repo}/actions/permissions') {
                                    if (\array_key_exists(Router\Put\Actions::class, $this->router) == false) {
                                        $this->router[Router\Put\Actions::class] = new Router\Put\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Actions::class]->setGithubActionsPermissionsRepository($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'collaborators') {
                            if ($pathChunks[5] == '{username}') {
                                if ($call == 'PUT /repos/{owner}/{repo}/collaborators/{username}') {
                                    if (\array_key_exists(Router\Put\Repos::class, $this->router) == false) {
                                        $this->router[Router\Put\Repos::class] = new Router\Put\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Repos::class]->addCollaborator($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'contents') {
                            if ($pathChunks[5] == '{path}') {
                                if ($call == 'PUT /repos/{owner}/{repo}/contents/{path}') {
                                    if (\array_key_exists(Router\Put\Repos::class, $this->router) == false) {
                                        $this->router[Router\Put\Repos::class] = new Router\Put\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Repos::class]->createOrUpdateFileContents($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'environments') {
                            if ($pathChunks[5] == '{environment_name}') {
                                if ($call == 'PUT /repos/{owner}/{repo}/environments/{environment_name}') {
                                    if (\array_key_exists(Router\Put\Repos::class, $this->router) == false) {
                                        $this->router[Router\Put\Repos::class] = new Router\Put\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Repos::class]->createOrUpdateEnvironment($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'teams') {
                if ($pathChunks[2] == '{team_id}') {
                    if ($pathChunks[3] == 'repos') {
                        if ($pathChunks[4] == '{owner}') {
                            if ($pathChunks[5] == '{repo}') {
                                if ($call == 'PUT /teams/{team_id}/repos/{owner}/{repo}') {
                                    if (\array_key_exists(Router\Put\Teams::class, $this->router) == false) {
                                        $this->router[Router\Put\Teams::class] = new Router\Put\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Teams::class]->addOrUpdateRepoPermissionsLegacy($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'user') {
                if ($pathChunks[2] == 'installations') {
                    if ($pathChunks[3] == '{installation_id}') {
                        if ($pathChunks[4] == 'repositories') {
                            if ($pathChunks[5] == '{repository_id}') {
                                if ($call == 'PUT /user/installations/{installation_id}/repositories/{repository_id}') {
                                    if (\array_key_exists(Router\Put\Apps::class, $this->router) == false) {
                                        $this->router[Router\Put\Apps::class] = new Router\Put\Apps($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Put\Apps::class]->addRepoToInstallationForAuthenticatedUser($params);
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
