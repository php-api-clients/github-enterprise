<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class SetSettings
{
    public const OPERATION_ID = 'enterprise-admin/set-settings';
    public const OPERATION_MATCH = 'PUT /setup/api/settings';
    private const METHOD = 'PUT';
    private const PATH = '/setup/api/settings';
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        $this->requestSchemaValidator->validate($data, \cebe\openapi\Reader::readFromJson(Schema\EnterpriseAdmin\SetSettings\Request\ApplicationxWwwFormUrlencoded::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array(), array(), self::PATH), array('Content-Type' => 'application/x-www-form-urlencoded'), json_encode($data));
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Psr\Http\Message\ResponseInterface
    {
        return $response;
    }
}
