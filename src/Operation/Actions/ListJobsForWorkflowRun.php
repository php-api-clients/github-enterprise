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
    /**The account owner of the repository. The name is not case sensitive. **/
    private string $owner;
    /**The name of the repository. The name is not case sensitive. **/
    private string $repo;
    /**The unique identifier of the workflow run. **/
    private int $runId;
    /**Filters jobs by their `completed_at` timestamp. `latest` returns jobs from the most recent execution of the workflow run. `all` returns all jobs for a workflow run, including from old executions of the workflow run. **/
    private string $filter;
    /**The number of results per page (max 100). **/
    private int $perPage;
    /**Page number of the results to fetch. **/
    private int $page;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\Owner\Repo\Actions\Runs\RunId\Jobs $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\Owner\Repo\Actions\Runs\RunId\Jobs $hydrator, string $owner, string $repo, int $runId, string $filter = 'latest', int $perPage = 30, int $page = 1)
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

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{run_id}', '{filter}', '{per_page}', '{page}'], [$this->owner, $this->repo, $this->runId, $this->filter, $this->perPage, $this->page], self::PATH . '?filter={filter}&per_page={per_page}&page={page}'));
    }

    public function createResponse(ResponseInterface $response): Schema\Operations\Actions\ListJobsForWorkflowRun\Response\ApplicationJson\Ok\Application\Json
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operations\Actions\ListJobsForWorkflowRun\Response\ApplicationJson\Ok\Application\Json::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\Operations\Actions\ListJobsForWorkflowRun\Response\ApplicationJson\Ok\Application\Json::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
