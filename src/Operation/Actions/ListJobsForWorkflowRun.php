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

final class ListJobsForWorkflowRun
{
    public const OPERATION_ID    = 'actions/list-jobs-for-workflow-run';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/actions/runs/{run_id}/jobs';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/actions/runs/{run_id}/jobs';
    private string $owner;
    private string $repo;
    /**The id of the workflow run.**/
    private int $runId;
    /**Filters jobs by their `completed_at` timestamp. Can be one of:
    \* `latest`: Returns jobs from the most recent execution of the workflow run.
    \* `all`: Returns all jobs for a workflow run, including from old executions of the workflow run.**/
    private string $filter;
    /**Results per page (max 100)**/
    private int $perPage;
    /**Page number of the results to fetch.**/
    private int $page;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Jobs $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Jobs $hydrator, string $owner, string $repo, int $runId, string $filter = 'latest', int $perPage = 30, int $page = 1)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->runId                   = $runId;
        $this->filter                  = $filter;
        $this->perPage                 = $perPage;
        $this->page                    = $page;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{run_id}', '{filter}', '{per_page}', '{page}'], [$this->owner, $this->repo, $this->runId, $this->filter, $this->perPage, $this->page], self::PATH . '?filter={filter}&per_page={per_page}&page={page}'));
    }

    public function createResponse(ResponseInterface $response): Schema\Operation\Actions\ListJobsForWorkflowRun\Response\Applicationjson\H200
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
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operation\Actions\ListJobsForWorkflowRun\Response\Applicationjson\H200::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\Operation\Actions\ListJobsForWorkflowRun\Response\Applicationjson\H200::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
