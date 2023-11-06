<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operation\Dependabot;

use ApiClients\Client\GitHubEnterprise\Internal;
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

final class GetOrgSecret
{
    public const OPERATION_ID    = 'dependabot/get-org-secret';
    public const OPERATION_MATCH = 'GET /orgs/{org}/dependabot/secrets/{secret_name}';
    /**The organization name. The name is not case sensitive. **/
    private string $org;
    /**The name of the secret. **/
    private string $secretName;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Internal\Hydrator\Operation\Orgs\Org\Dependabot\Secrets\SecretName $hydrator, string $org, string $secretName)
    {
        $this->org        = $org;
        $this->secretName = $secretName;
    }

    public function createRequest(): RequestInterface
    {
        return new Request('GET', str_replace(['{org}', '{secret_name}'], [$this->org, $this->secretName], '/orgs/{org}/dependabot/secrets/{secret_name}'));
    }

    public function createResponse(ResponseInterface $response): Schema\OrganizationDependabotSecret
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
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\OrganizationDependabotSecret::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\OrganizationDependabotSecret::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
