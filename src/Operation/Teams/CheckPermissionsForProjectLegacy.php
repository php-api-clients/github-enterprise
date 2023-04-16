<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Teams;

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

final class CheckPermissionsForProjectLegacy
{
    public const OPERATION_ID    = 'teams/check-permissions-for-project-legacy';
    public const OPERATION_MATCH = 'GET /teams/{team_id}/projects/{project_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/teams/{team_id}/projects/{project_id}';
    private int $teamId;
    private int $projectId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Teams\CbTeamIdRcb\Projects\CbProjectIdRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Teams\CbTeamIdRcb\Projects\CbProjectIdRcb $hydrator, int $teamId, int $projectId)
    {
        $this->teamId                  = $teamId;
        $this->projectId               = $projectId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{team_id}', '{project_id}'], [$this->teamId, $this->projectId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\TeamProject
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\TeamProject::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\TeamProject::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
