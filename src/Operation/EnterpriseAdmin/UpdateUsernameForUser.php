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
use function json_encode;
use function str_replace;

final class UpdateUsernameForUser
{
    public const OPERATION_ID    = 'enterprise-admin/update-username-for-user';
    public const OPERATION_MATCH = 'PATCH /admin/users/{username}';
    private const METHOD         = 'PATCH';
    private const PATH           = '/admin/users/{username}';
    private readonly SchemaValidator $requestSchemaValidator;
    private string $username;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Admin\Users\CbUsernameRcb $hydrator;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrator\Operation\Admin\Users\CbUsernameRcb $hydrator, string $username)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->username                = $username;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\EnterpriseAdmin\UpdateUsernameForUser\Request\Applicationjson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{username}'], [$this->username], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    public function createResponse(ResponseInterface $response): Schema\Operation\EnterpriseAdmin\UpdateUsernameForUser\Response\Applicationjson\H202
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
                    case 202:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operation\EnterpriseAdmin\UpdateUsernameForUser\Response\Applicationjson\H202::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\Operation\EnterpriseAdmin\UpdateUsernameForUser\Response\Applicationjson\H202::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
