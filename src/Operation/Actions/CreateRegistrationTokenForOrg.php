<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

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

final class CreateRegistrationTokenForOrg
{
    public const OPERATION_ID    = 'actions/create-registration-token-for-org';
    public const OPERATION_MATCH = 'POST /orgs/{org}/actions/runners/registration-token';
    private const METHOD         = 'POST';
    private const PATH           = '/orgs/{org}/actions/runners/registration-token';
    private string $org;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\RegistrationToken $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\RegistrationToken $hydrator, string $org)
    {
        $this->org                     = $org;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{org}'], [$this->org], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\AuthenticationToken
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\AuthenticationToken::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\AuthenticationToken::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
