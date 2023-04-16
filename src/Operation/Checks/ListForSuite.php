<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Checks;

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

final class ListForSuite
{
    public const OPERATION_ID    = 'checks/list-for-suite';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/check-suites/{check_suite_id}/check-runs';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/check-suites/{check_suite_id}/check-runs';
    private string $owner;
    private string $repo;
    /**check_suite_id parameter**/
    private int $checkSuiteId;
    /**Returns check runs with the specified `name`.**/
    private string $checkName;
    /**Returns check runs with the specified `status`. Can be one of `queued`, `in_progress`, or `completed`.**/
    private string $status;
    /**Filters check runs by their `completed_at` timestamp. Can be one of `latest` (returning the most recent check runs) or `all`.**/
    private string $filter;
    /**Results per page (max 100)**/
    private int $perPage;
    /**Page number of the results to fetch.**/
    private int $page;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\CheckDashSuites\CbCheckSuiteIdRcb\CheckDashRuns $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\CheckDashSuites\CbCheckSuiteIdRcb\CheckDashRuns $hydrator, string $owner, string $repo, int $checkSuiteId, string $checkName, string $status, string $filter = 'latest', int $perPage = 30, int $page = 1)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->checkSuiteId            = $checkSuiteId;
        $this->checkName               = $checkName;
        $this->status                  = $status;
        $this->filter                  = $filter;
        $this->perPage                 = $perPage;
        $this->page                    = $page;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{check_suite_id}', '{check_name}', '{status}', '{filter}', '{per_page}', '{page}'], [$this->owner, $this->repo, $this->checkSuiteId, $this->checkName, $this->status, $this->filter, $this->perPage, $this->page], self::PATH . '?check_name={check_name}&status={status}&filter={filter}&per_page={per_page}&page={page}'));
    }

    public function createResponse(ResponseInterface $response): Schema\Operation\Checks\ListForSuite\Response\Applicationjson\H200
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operation\Checks\ListForSuite\Response\Applicationjson\H200::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\Operation\Checks\ListForSuite\Response\Applicationjson\H200::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
