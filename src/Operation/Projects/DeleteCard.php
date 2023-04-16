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

final class DeleteCard
{
    public const OPERATION_ID    = 'projects/delete-card';
    public const OPERATION_MATCH = 'DELETE /projects/columns/cards/{card_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/projects/columns/cards/{card_id}';
    /**The unique identifier of the card.**/
    private int $cardId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Projects\Columns\Cards\CbCardIdRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Projects\Columns\Cards\CbCardIdRcb $hydrator, int $cardId)
    {
        $this->cardId                  = $cardId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{card_id}'], [$this->cardId], self::PATH));
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
                     * Forbidden
                    **/
                    case 403:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operation\Projects\DeleteCard\Response\Applicationjson\H403::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\Operation\Projects\DeleteCard\Response\Applicationjson\H403(403, $this->hydrator->hydrateObject(Schema\Operation\Projects\DeleteCard\Response\Applicationjson\H403::class, $body));
                    /**
                     * Requires authentication
                    **/

                    case 401:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\BasicError(401, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                    /**
                     * Resource not found
                    **/

                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
