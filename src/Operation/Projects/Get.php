<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Projects;

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
    public const OPERATION_ID    = 'projects/get';
    public const OPERATION_MATCH = 'GET /projects/{project_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/projects/{project_id}';
    /**The unique identifier of the project. **/
    private int $projectId;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Hydrator\Operation\Projects\ProjectId $hydrator, int $projectId)
    {
        $this->projectId = $projectId;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{project_id}'], [$this->projectId], self::PATH));
    }

    /** @return Schema\Project|array{code: int} */
    public function createResponse(ResponseInterface $response): Schema\Project|array
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Project::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\Project::class, $body);
                    /**
                     * Forbidden
                     **/

                    case 403:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(403, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                    /**
                     * Requires authentication
                     **/

                    case 401:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(401, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

        switch ($code) {
            /**
             * Not modified
             **/
            case 304:
                return ['code' => 304];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
