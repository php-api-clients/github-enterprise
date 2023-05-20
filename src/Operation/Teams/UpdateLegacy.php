<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Teams;

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

final class UpdateLegacy
{
    public const OPERATION_ID    = 'teams/update-legacy';
    public const OPERATION_MATCH = 'PATCH /teams/{team_id}';
    private const METHOD         = 'PATCH';
    private const PATH           = '/teams/{team_id}';
    private readonly SchemaValidator $requestSchemaValidator;
    /**The unique identifier of the team. **/
    private int $teamId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Teams\TeamId $hydrator;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrator\Operation\Teams\TeamId $hydrator, int $teamId)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->teamId                  = $teamId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Teams\UpdateLegacy\Request\ApplicationJson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{team_id}'], [$this->teamId], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    public function createResponse(ResponseInterface $response): Schema\TeamFull
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response when the updated information already exists
                     **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\TeamFull::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\TeamFull::class, $body);
                    /**
                     * Response
                     **/

                    case 201:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\TeamFull::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\TeamFull::class, $body);
                    /**
                     * Resource not found
                     **/

                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
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
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
