<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Apps;

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

final class DeleteInstallation
{
    public const OPERATION_ID    = 'apps/delete-installation';
    public const OPERATION_MATCH = 'DELETE /app/installations/{installation_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/app/installations/{installation_id}';
    /**installation_id parameter**/
    private int $installationId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\App\Installations\CbInstallationIdRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\App\Installations\CbInstallationIdRcb $hydrator, int $installationId)
    {
        $this->installationId          = $installationId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{installation_id}'], [$this->installationId], self::PATH));
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
