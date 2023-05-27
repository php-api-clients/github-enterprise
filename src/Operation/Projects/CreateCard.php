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
use function json_encode;
use function str_replace;

final class CreateCard
{
    public const OPERATION_ID    = 'projects/create-card';
    public const OPERATION_MATCH = 'POST /projects/columns/{column_id}/cards';
    private const METHOD         = 'POST';
    private const PATH           = '/projects/columns/{column_id}/cards';
    private readonly SchemaValidator $requestSchemaValidator;
    /**The unique identifier of the column. **/
    private int $columnId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Projects\Columns\ColumnId\Cards $hydrator;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrator\Operation\Projects\Columns\ColumnId\Cards $hydrator, int $columnId)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->columnId                = $columnId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Projects\CreateCard\Request\ApplicationJson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{column_id}'], [$this->columnId], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    /**
     * @return Schema\ProjectCard|array{code: int}
     */
    public function createResponse(ResponseInterface $response): Schema\ProjectCard|array
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ProjectCard::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\ProjectCard::class, $body);
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
                    /**
                     * Response
                     **/

                    case 503:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operations\Projects\CreateCard\Response\ApplicationJson\ServiceUnavailable\Application\Json::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\Operations\Projects\CreateCard\Response\ApplicationJson\ServiceUnavailable\Application\Json(503, $this->hydrator->hydrateObject(Schema\Operations\Projects\CreateCard\Response\ApplicationJson\ServiceUnavailable\Application\Json::class, $body));
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
