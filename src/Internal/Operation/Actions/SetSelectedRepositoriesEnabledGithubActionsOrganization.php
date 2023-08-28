<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operation\Actions;

use ApiClients\Client\GitHubEnterprise\Schema;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function json_encode;
use function str_replace;

final class SetSelectedRepositoriesEnabledGithubActionsOrganization
{
    public const OPERATION_ID    = 'actions/set-selected-repositories-enabled-github-actions-organization';
    public const OPERATION_MATCH = 'PUT /orgs/{org}/actions/permissions/repositories';
    private const METHOD         = 'PUT';
    private const PATH           = '/orgs/{org}/actions/permissions/repositories';
    /**The organization name. The name is not case sensitive. **/
    private string $org;

    public function __construct(private readonly SchemaValidator $requestSchemaValidator, string $org)
    {
        $this->org = $org;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Actions\SetSelectedRepositoriesEnabledGithubActionsOrganization\Request\ApplicationJson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{org}'], [$this->org], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    /** @return array{code: int} */
    public function createResponse(ResponseInterface $response): array
    {
        $code = $response->getStatusCode();
        switch ($code) {
            /**
             * Response
             **/
            case 204:
                return ['code' => 204];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
