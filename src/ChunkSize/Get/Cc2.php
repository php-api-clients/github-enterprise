<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\ChunkSize\Get;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class Cc2
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
            if ($pathChunks[1] == 'app') {
                if ($call == 'GET /app') {
                    if (\array_key_exists(Router\Get\Apps::class, $this->router) == false) {
                        $this->router[Router\Get\Apps::class] = new Router\Get\Apps($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Apps::class]->getAuthenticated($params);
                }
            } elseif ($pathChunks[1] == 'authorizations') {
                if ($call == 'GET /authorizations') {
                    if (\array_key_exists(Router\Get\OauthAuthorizations::class, $this->router) == false) {
                        $this->router[Router\Get\OauthAuthorizations::class] = new Router\Get\OauthAuthorizations($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\OauthAuthorizations::class]->listAuthorizations($params);
                }
            } elseif ($pathChunks[1] == 'codes_of_conduct') {
                if ($call == 'GET /codes_of_conduct') {
                    if (\array_key_exists(Router\Get\CodesOfConduct::class, $this->router) == false) {
                        $this->router[Router\Get\CodesOfConduct::class] = new Router\Get\CodesOfConduct($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\CodesOfConduct::class]->getAllCodesOfConduct($params);
                }
            } elseif ($pathChunks[1] == 'emojis') {
                if ($call == 'GET /emojis') {
                    if (\array_key_exists(Router\Get\Emojis::class, $this->router) == false) {
                        $this->router[Router\Get\Emojis::class] = new Router\Get\Emojis($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Emojis::class]->get($params);
                }
            } elseif ($pathChunks[1] == 'events') {
                if ($call == 'GET /events') {
                    if (\array_key_exists(Router\Get\Activity::class, $this->router) == false) {
                        $this->router[Router\Get\Activity::class] = new Router\Get\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Activity::class]->listPublicEvents($params);
                }
            } elseif ($pathChunks[1] == 'feeds') {
                if ($call == 'GET /feeds') {
                    if (\array_key_exists(Router\Get\Activity::class, $this->router) == false) {
                        $this->router[Router\Get\Activity::class] = new Router\Get\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Activity::class]->getFeeds($params);
                }
            } elseif ($pathChunks[1] == 'gists') {
                if ($call == 'GET /gists') {
                    if (\array_key_exists(Router\Get\Gists::class, $this->router) == false) {
                        $this->router[Router\Get\Gists::class] = new Router\Get\Gists($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Gists::class]->list($params);
                }
            } elseif ($pathChunks[1] == 'issues') {
                if ($call == 'GET /issues') {
                    if (\array_key_exists(Router\Get\Issues::class, $this->router) == false) {
                        $this->router[Router\Get\Issues::class] = new Router\Get\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Issues::class]->list($params);
                }
            } elseif ($pathChunks[1] == 'licenses') {
                if ($call == 'GET /licenses') {
                    if (\array_key_exists(Router\Get\Licenses::class, $this->router) == false) {
                        $this->router[Router\Get\Licenses::class] = new Router\Get\Licenses($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Licenses::class]->getAllCommonlyUsed($params);
                }
            } elseif ($pathChunks[1] == 'meta') {
                if ($call == 'GET /meta') {
                    if (\array_key_exists(Router\Get\Meta::class, $this->router) == false) {
                        $this->router[Router\Get\Meta::class] = new Router\Get\Meta($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Meta::class]->get($params);
                }
            } elseif ($pathChunks[1] == 'notifications') {
                if ($call == 'GET /notifications') {
                    if (\array_key_exists(Router\Get\Activity::class, $this->router) == false) {
                        $this->router[Router\Get\Activity::class] = new Router\Get\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Activity::class]->listNotificationsForAuthenticatedUser($params);
                }
            } elseif ($pathChunks[1] == 'octocat') {
                if ($call == 'GET /octocat') {
                    if (\array_key_exists(Router\Get\Meta::class, $this->router) == false) {
                        $this->router[Router\Get\Meta::class] = new Router\Get\Meta($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Meta::class]->getOctocat($params);
                }
            } elseif ($pathChunks[1] == 'organizations') {
                if ($call == 'GET /organizations') {
                    if (\array_key_exists(Router\Get\Orgs::class, $this->router) == false) {
                        $this->router[Router\Get\Orgs::class] = new Router\Get\Orgs($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Orgs::class]->list($params);
                }
            } elseif ($pathChunks[1] == 'rate_limit') {
                if ($call == 'GET /rate_limit') {
                    if (\array_key_exists(Router\Get\RateLimit::class, $this->router) == false) {
                        $this->router[Router\Get\RateLimit::class] = new Router\Get\RateLimit($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\RateLimit::class]->get($params);
                }
            } elseif ($pathChunks[1] == 'repositories') {
                if ($call == 'GET /repositories') {
                    if (\array_key_exists(Router\Get\Repos::class, $this->router) == false) {
                        $this->router[Router\Get\Repos::class] = new Router\Get\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Repos::class]->listPublic($params);
                }
            } elseif ($pathChunks[1] == 'user') {
                if ($call == 'GET /user') {
                    if (\array_key_exists(Router\Get\Users::class, $this->router) == false) {
                        $this->router[Router\Get\Users::class] = new Router\Get\Users($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Users::class]->getAuthenticated($params);
                }
            } elseif ($pathChunks[1] == 'users') {
                if ($call == 'GET /users') {
                    if (\array_key_exists(Router\Get\Users::class, $this->router) == false) {
                        $this->router[Router\Get\Users::class] = new Router\Get\Users($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Users::class]->list($params);
                }
            } elseif ($pathChunks[1] == 'zen') {
                if ($call == 'GET /zen') {
                    if (\array_key_exists(Router\Get\Meta::class, $this->router) == false) {
                        $this->router[Router\Get\Meta::class] = new Router\Get\Meta($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Get\Meta::class]->getZen($params);
                }
            }
        }
        throw new \InvalidArgumentException();
    }
}
