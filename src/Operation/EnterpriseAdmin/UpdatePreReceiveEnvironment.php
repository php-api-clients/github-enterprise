<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class UpdatePreReceiveEnvironment
{
    public const OPERATION_ID = 'enterprise-admin/update-pre-receive-environment';
    public const OPERATION_MATCH = 'PATCH /admin/pre-receive-environments/{pre_receive_environment_id}';
    private const METHOD = 'PATCH';
    private const PATH = '/admin/pre-receive-environments/{pre_receive_environment_id}';
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    /**The unique identifier of the pre-receive environment.**/
    private int $preReceiveEnvironmentId;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb $hydrator, int $preReceiveEnvironmentId)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->preReceiveEnvironmentId = $preReceiveEnvironmentId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        $this->requestSchemaValidator->validate($data, \cebe\openapi\Reader::readFromJson(Schema\EnterpriseAdmin\UpdatePreReceiveEnvironment\Request\Applicationjson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{pre_receive_environment_id}'), array($this->preReceiveEnvironmentId), self::PATH), array('Content-Type' => 'application/json'), json_encode($data));
    }
    /**
     * @return Schema\PreReceiveEnvironment
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\PreReceiveEnvironment
    {
        $code = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response
                    **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\PreReceiveEnvironment::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\PreReceiveEnvironment::class, $body);
                    /**
                     * Client Errors
                    **/
                    case 422:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\Operation\EnterpriseAdmin\UpdatePreReceiveEnvironment\Response\Applicationjson\H422::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        throw new ErrorSchemas\Operation\EnterpriseAdmin\UpdatePreReceiveEnvironment\Response\Applicationjson\H422(422, $this->hydrator->hydrateObject(Schema\Operation\EnterpriseAdmin\UpdatePreReceiveEnvironment\Response\Applicationjson\H422::class, $body));
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
