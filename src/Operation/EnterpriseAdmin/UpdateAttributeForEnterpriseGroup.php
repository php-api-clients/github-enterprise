<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

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

final class UpdateAttributeForEnterpriseGroup
{
    public const OPERATION_ID    = 'enterprise-admin/update-attribute-for-enterprise-group';
    public const OPERATION_MATCH = 'PATCH /scim/v2/Groups/{scim_group_id}';
    private const METHOD         = 'PATCH';
    private const PATH           = '/scim/v2/Groups/{scim_group_id}';
    private readonly SchemaValidator $requestSchemaValidator;
    /**A unique identifier of the SCIM group. **/
    private string $scimGroupId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Scim\V2\Groups\ScimGroupId $hydrator;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrator\Operation\Scim\V2\Groups\ScimGroupId $hydrator, string $scimGroupId)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->scimGroupId             = $scimGroupId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\PatchSchema::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{scim_group_id}'], [$this->scimGroupId], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    /**
     * @return array{code: int}
     */
    public function createResponse(ResponseInterface $response): array
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Bad request
                     **/
                    case 400:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ScimError(400, $this->hydrator->hydrateObject(Schema\ScimError::class, $body));
                    /**
                     * Resource not found
                     **/

                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                    /**
                     * Too many requests
                     **/

                    case 429:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ScimError(429, $this->hydrator->hydrateObject(Schema\ScimError::class, $body));
                    /**
                     * Internal server error
                     **/

                    case 500:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ScimError(500, $this->hydrator->hydrateObject(Schema\ScimError::class, $body));
                }

                break;
        }

        switch ($code) {
            /**
             * Response
             **/
            case 204:
                return ['code' => 204];
            /**
             * Authorization failure
             **/

            case 401:
                return ['code' => 401];
            /**
             * Permission denied
             **/

            case 403:
                return ['code' => 403];
            /**
             * Duplicate record detected
             **/

            case 409:
                return ['code' => 409];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
