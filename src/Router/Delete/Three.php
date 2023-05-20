<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Delete;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Three
{
    private array $router = [];
    private readonly SchemaValidator $requestSchemaValidator;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrators $hydrators;
    private readonly Browser $browser;
    private readonly AuthenticationInterface $authentication;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrators $hydrators, Browser $browser, AuthenticationInterface $authentication)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrators               = $hydrators;
        $this->browser                 = $browser;
        $this->authentication          = $authentication;
    }

    public function call(string $call, array $params, array $pathChunks)
    {
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'authorizations') {
                if ($pathChunks[2] === '{authorization_id}') {
                    if ($call === 'DELETE /authorizations/{authorization_id}') {
                        if (array_key_exists(Router\Delete\OauthAuthorizations::class, $this->router) === false) {
                            $this->router[Router\Delete\OauthAuthorizations::class] = new Router\Delete\OauthAuthorizations($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Delete\OauthAuthorizations::class]->deleteAuthorization($params);
                    }
                }
            } elseif ($pathChunks[1] === 'enterprise') {
                if ($pathChunks[2] === 'announcement') {
                    if ($call === 'DELETE /enterprise/announcement') {
                        if (array_key_exists(Router\Delete\EnterpriseAdmin::class, $this->router) === false) {
                            $this->router[Router\Delete\EnterpriseAdmin::class] = new Router\Delete\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Delete\EnterpriseAdmin::class]->removeAnnouncement($params);
                    }
                }
            } elseif ($pathChunks[1] === 'gists') {
                if ($pathChunks[2] === '{gist_id}') {
                    if ($call === 'DELETE /gists/{gist_id}') {
                        if (array_key_exists(Router\Delete\Gists::class, $this->router) === false) {
                            $this->router[Router\Delete\Gists::class] = new Router\Delete\Gists($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Delete\Gists::class]->delete($params);
                    }
                }
            } elseif ($pathChunks[1] === 'installation') {
                if ($pathChunks[2] === 'token') {
                    if ($call === 'DELETE /installation/token') {
                        if (array_key_exists(Router\Delete\Apps::class, $this->router) === false) {
                            $this->router[Router\Delete\Apps::class] = new Router\Delete\Apps($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Delete\Apps::class]->revokeInstallationAccessToken($params);
                    }
                }
            } elseif ($pathChunks[1] === 'projects') {
                if ($pathChunks[2] === '{project_id}') {
                    if ($call === 'DELETE /projects/{project_id}') {
                        if (array_key_exists(Router\Delete\Projects::class, $this->router) === false) {
                            $this->router[Router\Delete\Projects::class] = new Router\Delete\Projects($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Delete\Projects::class]->delete($params);
                    }
                }
            } elseif ($pathChunks[1] === 'teams') {
                if ($pathChunks[2] === '{team_id}') {
                    if ($call === 'DELETE /teams/{team_id}') {
                        if (array_key_exists(Router\Delete\Teams::class, $this->router) === false) {
                            $this->router[Router\Delete\Teams::class] = new Router\Delete\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Delete\Teams::class]->deleteLegacy($params);
                    }
                }
            } elseif ($pathChunks[1] === 'user') {
                if ($pathChunks[2] === 'emails') {
                    if ($call === 'DELETE /user/emails') {
                        if (array_key_exists(Router\Delete\Users::class, $this->router) === false) {
                            $this->router[Router\Delete\Users::class] = new Router\Delete\Users($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Delete\Users::class]->deleteEmailForAuthenticatedUser($params);
                    }
                }
            }
        }

        throw new InvalidArgumentException();
    }
}
