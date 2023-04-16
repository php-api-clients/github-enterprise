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
use function str_replace;

final class GetLegacy
{
    public const OPERATION_ID    = 'teams/get-legacy';
    public const OPERATION_MATCH = 'GET /teams/{team_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/teams/{team_id}';
    /**The unique identifier of the team.**/
    private int $teamId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Teams\CbTeamIdRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Teams\CbTeamIdRcb $hydrator, int $teamId)
    {
        $this->teamId                  = $teamId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{team_id}'], [$this->teamId], self::PATH));
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
                     * Response
                    **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\TeamFull::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\TeamFull::class, $body);
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
