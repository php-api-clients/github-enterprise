<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

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

final class GetAllStats
{
    public const OPERATION_ID    = 'enterprise-admin/get-all-stats';
    public const OPERATION_MATCH = 'GET /enterprise/stats/all';
    private const METHOD         = 'GET';
    private const PATH           = '/enterprise/stats/all';
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Enterprise\Stats\All $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Enterprise\Stats\All $hydrator)
    {
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace([], [], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\EnterpriseOverview
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\EnterpriseOverview::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\EnterpriseOverview::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
