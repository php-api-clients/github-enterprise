<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Git;

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

final class DeleteRef
{
    public const OPERATION_ID    = 'git/delete-ref';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/git/refs/{ref}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/git/refs/{ref}';
    private string $owner;
    private string $repo;
    /**ref parameter**/
    private string $ref;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Git\Refs\CbRefRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Git\Refs\CbRefRcb $hydrator, string $owner, string $repo, string $ref)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->ref                     = $ref;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{ref}'], [$this->owner, $this->repo, $this->ref], self::PATH));
    }

    public function createResponse(ResponseInterface $response): mixed
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Validation failed
                    **/
                    case 422:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ValidationError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\ValidationError(422, $this->hydrator->hydrateObject(Schema\ValidationError::class, $body));
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
