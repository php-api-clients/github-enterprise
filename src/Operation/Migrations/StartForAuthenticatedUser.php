<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Migrations;

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

final class StartForAuthenticatedUser
{
    public const OPERATION_ID    = 'migrations/start-for-authenticated-user';
    public const OPERATION_MATCH = 'POST /user/migrations';
    private const METHOD         = 'POST';
    private const PATH           = '/user/migrations';
    private readonly SchemaValidator $requestSchemaValidator;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\User\Migrations $hydrator;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrator\Operation\User\Migrations $hydrator)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Migrations\StartForAuthenticatedUser\Request\ApplicationJson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace([], [], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    /**
     * @return Schema\Migration|array{code: int}
     */
    public function createResponse(ResponseInterface $response): Schema\Migration|array
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Migration::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\Migration::class, $body);
                    /**
                     * Validation failed, or the endpoint has been spammed.
                     **/

                    case 422:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ValidationError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ValidationError(422, $this->hydrator->hydrateObject(Schema\ValidationError::class, $body));
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
