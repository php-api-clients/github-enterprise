<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Orgs;

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

final class DeleteWebhook
{
    public const OPERATION_ID    = 'orgs/delete-webhook';
    public const OPERATION_MATCH = 'DELETE /orgs/{org}/hooks/{hook_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/orgs/{org}/hooks/{hook_id}';
    /**The organization name. The name is not case sensitive. **/
    private string $org;
    /**The unique identifier of the hook. **/
    private int $hookId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Orgs\Org\Hooks\HookId $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Orgs\Org\Hooks\HookId $hydrator, string $org, int $hookId)
    {
        $this->org                     = $org;
        $this->hookId                  = $hookId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{org}', '{hook_id}'], [$this->org, $this->hookId], self::PATH));
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
                     * Resource not found
                     **/
                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

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
