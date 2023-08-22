<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Stream;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Eight
{
    private array $router = [];

    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return Observable<string> */
    public function call(string $call, array $params, array $pathChunks): iterable
    {
        $matched = false;
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'repos') {
                if ($pathChunks[2] === '{owner}') {
                    if ($pathChunks[3] === '{repo}') {
                        if ($pathChunks[4] === 'actions') {
                            if ($pathChunks[5] === 'artifacts') {
                                if ($pathChunks[6] === '{artifact_id}') {
                                    if ($pathChunks[7] === '{archive_format}') {
                                        if ($call === 'STREAM /repos/{owner}/{repo}/actions/artifacts/{artifact_id}/{archive_format}') {
                                            $matched = true;
                                            if (array_key_exists(Router\Stream\Actions::class, $this->router) === false) {
                                                $this->router[Router\Stream\Actions::class] = new Router\Stream\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                            }

                                            return $this->router[Router\Stream\Actions::class]->DownloadArtifactStreaming($params);
                                        }
                                    }
                                }
                            } elseif ($pathChunks[5] === 'jobs') {
                                if ($pathChunks[6] === '{job_id}') {
                                    if ($pathChunks[7] === 'logs') {
                                        if ($call === 'STREAM /repos/{owner}/{repo}/actions/jobs/{job_id}/logs') {
                                            $matched = true;
                                            if (array_key_exists(Router\Stream\Actions::class, $this->router) === false) {
                                                $this->router[Router\Stream\Actions::class] = new Router\Stream\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                            }

                                            return $this->router[Router\Stream\Actions::class]->DownloadJobLogsForWorkflowRunStreaming($params);
                                        }
                                    }
                                }
                            } elseif ($pathChunks[5] === 'runs') {
                                if ($pathChunks[6] === '{run_id}') {
                                    if ($pathChunks[7] === 'logs') {
                                        if ($call === 'STREAM /repos/{owner}/{repo}/actions/runs/{run_id}/logs') {
                                            $matched = true;
                                            if (array_key_exists(Router\Stream\Actions::class, $this->router) === false) {
                                                $this->router[Router\Stream\Actions::class] = new Router\Stream\Actions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                            }

                                            return $this->router[Router\Stream\Actions::class]->DownloadWorkflowRunLogsStreaming($params);
                                        }
                                    }
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
