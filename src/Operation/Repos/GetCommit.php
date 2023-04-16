<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Repos;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
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

final class GetCommit
{
    public const OPERATION_ID    = 'repos/get-commit';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/commits/{ref}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/commits/{ref}';
    private string $owner;
    private string $repo;
    /**ref parameter**/
    private string $ref;
    /**Page number of the results to fetch.**/
    private int $page;
    /**Results per page (max 100)**/
    private int $perPage;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Commits\CbRefRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Commits\CbRefRcb $hydrator, string $owner, string $repo, string $ref, int $page = 1, int $perPage = 30)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->ref                     = $ref;
        $this->page                    = $page;
        $this->perPage                 = $perPage;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{ref}', '{page}', '{per_page}'], [$this->owner, $this->repo, $this->ref, $this->page, $this->perPage], self::PATH . '?page={page}&per_page={per_page}'));
    }

    public function createResponse(ResponseInterface $response): Schema\Commit
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Commit::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\Commit::class, $body);
                    /**
                     * Validation failed
                    **/

                    case 422:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ValidationError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\ValidationError(422, $this->hydrator->hydrateObject(Schema\ValidationError::class, $body));
                    /**
                     * Resource not found
                    **/

                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                    /**
                     * Internal Error
                    **/

                    case 500:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\BasicError(500, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
