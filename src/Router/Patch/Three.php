<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Patch;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\Schema\Announcement;
use ApiClients\Client\GitHubEnterprise\Schema\Authorization;
use ApiClients\Client\GitHubEnterprise\Schema\GistSimple;
use ApiClients\Client\GitHubEnterprise\Schema\OrganizationFull;
use ApiClients\Client\GitHubEnterprise\Schema\Project;
use ApiClients\Client\GitHubEnterprise\Schema\TeamFull;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Three
{
    private array $router = [];

    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return |(Schema\Project|array{code: int}) */
    public function call(string $call, array $params, array $pathChunks): Authorization|Announcement|GistSimple|OrganizationFull|Project|TeamFull|array
    {
        $matched = false;
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'authorizations') {
                if ($pathChunks[2] === '{authorization_id}') {
                    if ($call === 'PATCH /authorizations/{authorization_id}') {
                        $matched = true;
                        if (array_key_exists(Router\Patch\OauthAuthorizations::class, $this->router) === false) {
                            $this->router[Router\Patch\OauthAuthorizations::class] = new Router\Patch\OauthAuthorizations($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Patch\OauthAuthorizations::class]->UpdateAuthorization($params);
                    }
                }
            } elseif ($pathChunks[1] === 'enterprise') {
                if ($pathChunks[2] === 'announcement') {
                    if ($call === 'PATCH /enterprise/announcement') {
                        $matched = true;
                        if (array_key_exists(Router\Patch\EnterpriseAdmin::class, $this->router) === false) {
                            $this->router[Router\Patch\EnterpriseAdmin::class] = new Router\Patch\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Patch\EnterpriseAdmin::class]->SetAnnouncement($params);
                    }
                }
            } elseif ($pathChunks[1] === 'gists') {
                if ($pathChunks[2] === '{gist_id}') {
                    if ($call === 'PATCH /gists/{gist_id}') {
                        $matched = true;
                        if (array_key_exists(Router\Patch\Gists::class, $this->router) === false) {
                            $this->router[Router\Patch\Gists::class] = new Router\Patch\Gists($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Patch\Gists::class]->Update($params);
                    }
                }
            } elseif ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($call === 'PATCH /orgs/{org}') {
                        $matched = true;
                        if (array_key_exists(Router\Patch\Orgs::class, $this->router) === false) {
                            $this->router[Router\Patch\Orgs::class] = new Router\Patch\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Patch\Orgs::class]->Update($params);
                    }
                }
            } elseif ($pathChunks[1] === 'projects') {
                if ($pathChunks[2] === '{project_id}') {
                    if ($call === 'PATCH /projects/{project_id}') {
                        $matched = true;
                        if (array_key_exists(Router\Patch\Projects::class, $this->router) === false) {
                            $this->router[Router\Patch\Projects::class] = new Router\Patch\Projects($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Patch\Projects::class]->Update($params);
                    }
                }
            } elseif ($pathChunks[1] === 'teams') {
                if ($pathChunks[2] === '{team_id}') {
                    if ($call === 'PATCH /teams/{team_id}') {
                        $matched = true;
                        if (array_key_exists(Router\Patch\Teams::class, $this->router) === false) {
                            $this->router[Router\Patch\Teams::class] = new Router\Patch\Teams($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                        }

                        return $this->router[Router\Patch\Teams::class]->UpdateLegacy($params);
                    }
                }
            }
        }

        if ($matched === false) {
            throw new InvalidArgumentException();
        }
    }
}
