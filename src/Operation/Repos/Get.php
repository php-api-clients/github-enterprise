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

final class Get
{
    public const OPERATION_ID    = 'repos/get';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}';
    private string $owner;
    private string $repo;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb $hydrator, string $owner, string $repo)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}'], [$this->owner, $this->repo], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\FullRepository|Schema\BasicError
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\FullRepository::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\FullRepository::class, $body);
                    /**
                     * Forbidden
                    **/

                    case 403:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\BasicError(403, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                    /**
                     * Resource not found
                    **/

                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                    /**
                     * Moved permanently
                    **/

                    case 301:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\BasicError::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
