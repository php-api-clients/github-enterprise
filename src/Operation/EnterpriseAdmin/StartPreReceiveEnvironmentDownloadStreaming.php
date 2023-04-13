<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class StartPreReceiveEnvironmentDownloadStreaming
{
    public const OPERATION_ID = 'enterprise-admin/start-pre-receive-environment-download';
    public const OPERATION_MATCH = 'STREAM /admin/pre-receive-environments/{pre_receive_environment_id}/downloads';
    private const METHOD = 'POST';
    private const PATH = '/admin/pre-receive-environments/{pre_receive_environment_id}/downloads';
    /**The unique identifier of the pre-receive environment.**/
    private int $preReceiveEnvironmentId;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads $hydrator;
    private readonly \React\Http\Browser $browser;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads $hydrator, \React\Http\Browser $browser, int $preReceiveEnvironmentId)
    {
        $this->preReceiveEnvironmentId = $preReceiveEnvironmentId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
        $this->browser = $browser;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{pre_receive_environment_id}'), array($this->preReceiveEnvironmentId), self::PATH));
    }
    /**
     * @return Schema\PreReceiveEnvironmentDownloadStatus
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\PreReceiveEnvironmentDownloadStatus
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
                    case 202:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\PreReceiveEnvironmentDownloadStatus::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\PreReceiveEnvironmentDownloadStatus::class, $body);
                    /**
                     * Client Errors
                    **/
                    case 422:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\Operation\EnterpriseAdmin\StartPreReceiveEnvironmentDownloadStreaming\Response\Applicationjson\H422::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        throw new ErrorSchemas\Operation\EnterpriseAdmin\StartPreReceiveEnvironmentDownloadStreaming\Response\Applicationjson\H422(422, $this->hydrator->hydrateObject(Schema\Operation\EnterpriseAdmin\StartPreReceiveEnvironmentDownloadStreaming\Response\Applicationjson\H422::class, $body));
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
