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
use function json_encode;
use function str_replace;

final class GenerateReleaseNotes
{
    public const OPERATION_ID    = 'repos/generate-release-notes';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/releases/generate-notes';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/releases/generate-notes';
    private readonly SchemaValidator $requestSchemaValidator;
    /**The account owner of the repository. The name is not case sensitive. **/
    private string $owner;
    /**The name of the repository. The name is not case sensitive. **/
    private string $repo;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\Owner\Repo\Releases\GenerateNotes $hydrator;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\Owner\Repo\Releases\GenerateNotes $hydrator, string $owner, string $repo)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Repos\GenerateReleaseNotes\Request\ApplicationJson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{owner}', '{repo}'], [$this->owner, $this->repo], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    public function createResponse(ResponseInterface $response): Schema\ReleaseNotesContent
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Name and body of generated release notes
                     **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ReleaseNotesContent::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\ReleaseNotesContent::class, $body);
                    /**
                     * Resource not found
                     **/

                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
