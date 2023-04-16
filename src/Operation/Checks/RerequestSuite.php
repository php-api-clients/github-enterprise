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

final class RerequestSuite
{
    public const OPERATION_ID    = 'checks/rerequest-suite';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/check-suites/{check_suite_id}/rerequest';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/check-suites/{check_suite_id}/rerequest';
    /**The account owner of the repository. The name is not case sensitive.**/
    private string $owner;
    /**The name of the repository. The name is not case sensitive.**/
    private string $repo;
    /**The unique identifier of the check suite.**/
    private int $checkSuiteId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\CheckDashSuites\CbCheckSuiteIdRcb\Rerequest $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\CheckDashSuites\CbCheckSuiteIdRcb\Rerequest $hydrator, string $owner, string $repo, int $checkSuiteId)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->checkSuiteId            = $checkSuiteId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{check_suite_id}'], [$this->owner, $this->repo, $this->checkSuiteId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\Operation\Checks\RerequestSuite\Response\Applicationjson\H201
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operation\Checks\RerequestSuite\Response\Applicationjson\H201::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\Operation\Checks\RerequestSuite\Response\Applicationjson\H201::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
