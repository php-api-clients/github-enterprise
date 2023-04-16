<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

use ApiClients\Client\GitHubEnterprise\Schema;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;

use function json_encode;
use function str_replace;

final class SetSelectedReposForOrgSecret
{
    public const OPERATION_ID    = 'actions/set-selected-repos-for-org-secret';
    public const OPERATION_MATCH = 'PUT /orgs/{org}/actions/secrets/{secret_name}/repositories';
    private const METHOD         = 'PUT';
    private const PATH           = '/orgs/{org}/actions/secrets/{secret_name}/repositories';
    private readonly SchemaValidator $requestSchemaValidator;
    private string $org;
    /**secret_name parameter**/
    private string $secretName;

    public function __construct(SchemaValidator $requestSchemaValidator, string $org, string $secretName)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->org                    = $org;
        $this->secretName             = $secretName;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Actions\SetSelectedReposForOrgSecret\Request\Applicationjson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{org}', '{secret_name}'], [$this->org, $this->secretName], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    public function createResponse(ResponseInterface $response): ResponseInterface
    {
        return $response;
    }
}
