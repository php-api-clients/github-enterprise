<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\ChunkSize\Post;

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
            if ($pathChunks[1] == 'authorizations') {
                if ($call == 'POST /authorizations') {
                    if (\array_key_exists(Router\Post\OauthAuthorizations::class, $this->router) == false) {
                        $this->router[Router\Post\OauthAuthorizations::class] = new Router\Post\OauthAuthorizations($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Post\OauthAuthorizations::class]->createAuthorization($params);
                }
            } elseif ($pathChunks[1] == 'gists') {
                if ($call == 'POST /gists') {
                    if (\array_key_exists(Router\Post\Gists::class, $this->router) == false) {
                        $this->router[Router\Post\Gists::class] = new Router\Post\Gists($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Post\Gists::class]->create($params);
                }
            } elseif ($pathChunks[1] == 'markdown') {
                if ($call == 'POST /markdown') {
                    if (\array_key_exists(Router\Post\Markdown::class, $this->router) == false) {
                        $this->router[Router\Post\Markdown::class] = new Router\Post\Markdown($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Post\Markdown::class]->render($params);
                }
            }
        }
        throw new \InvalidArgumentException();
    }
}
