<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\ChunkSize\Stream;

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
                if ($pathChunks[2] == 'pre-receive-environments') {
                    if ($pathChunks[3] == '{pre_receive_environment_id}') {
                        if ($pathChunks[4] == 'downloads') {
                            if ($pathChunks[5] == 'latest') {
                                if ($call == 'STREAM /admin/pre-receive-environments/{pre_receive_environment_id}/downloads/latest') {
                                    if (\array_key_exists(Router\Get\EnterpriseAdmin::class, $this->router) == false) {
                                        $this->router[Router\Get\EnterpriseAdmin::class] = new Router\Get\EnterpriseAdmin($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Get\EnterpriseAdmin::class]->getDownloadStatusForPreReceiveEnvironmentStreaming($params);
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] == 'repos') {
                if ($pathChunks[2] == '{owner}') {
                    if ($pathChunks[3] == '{repo}') {
                        if ($pathChunks[4] == 'tarball') {
                            if ($pathChunks[5] == '{ref}') {
                                if ($call == 'STREAM /repos/{owner}/{repo}/tarball/{ref}') {
                                    if (\array_key_exists(Router\Get\Repos::class, $this->router) == false) {
                                        $this->router[Router\Get\Repos::class] = new Router\Get\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Get\Repos::class]->downloadTarballArchiveStreaming($params);
                                }
                            }
                        } elseif ($pathChunks[4] == 'zipball') {
                            if ($pathChunks[5] == '{ref}') {
                                if ($call == 'STREAM /repos/{owner}/{repo}/zipball/{ref}') {
                                    if (\array_key_exists(Router\Get\Repos::class, $this->router) == false) {
                                        $this->router[Router\Get\Repos::class] = new Router\Get\Repos($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                    }
                                    return $this->router[Router\Get\Repos::class]->downloadZipballArchiveStreaming($params);
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
