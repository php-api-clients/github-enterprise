<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function explode;
use function json_decode;
use function str_replace;

final class ReRunWorkflow
{
    public const OPERATION_ID    = 'actions/re-run-workflow';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/actions/runs/{run_id}/rerun';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/actions/runs/{run_id}/rerun';
    private string $owner;
    private string $repo;
    /**The id of the workflow run.**/
    private int $runId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Rerun $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Rerun $hydrator, string $owner, string $repo, int $runId)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->runId                   = $runId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{run_id}'], [$this->owner, $this->repo, $this->runId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\Operation\Actions\ReRunWorkflow\Response\Applicationjson\H201
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response
                    **/
                    case 201:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operation\Actions\ReRunWorkflow\Response\Applicationjson\H201::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\Operation\Actions\ReRunWorkflow\Response\Applicationjson\H201::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
