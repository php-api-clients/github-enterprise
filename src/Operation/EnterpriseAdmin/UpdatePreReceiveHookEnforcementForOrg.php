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
final class UpdatePreReceiveHookEnforcementForOrg
{
    public const OPERATION_ID = 'enterprise-admin/update-pre-receive-hook-enforcement-for-org';
    public const OPERATION_MATCH = 'PATCH /orgs/{org}/pre-receive-hooks/{pre_receive_hook_id}';
    private const METHOD = 'PATCH';
    private const PATH = '/orgs/{org}/pre-receive-hooks/{pre_receive_hook_id}';
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    /**The organization name. The name is not case sensitive.**/
    private string $org;
    /**The unique identifier of the pre-receive hook.**/
    private int $preReceiveHookId;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Orgs\CbOrgRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Orgs\CbOrgRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb $hydrator, string $org, int $preReceiveHookId)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->org = $org;
        $this->preReceiveHookId = $preReceiveHookId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        $this->requestSchemaValidator->validate($data, \cebe\openapi\Reader::readFromJson(Schema\EnterpriseAdmin\UpdatePreReceiveHookEnforcementForOrg\Request\Applicationjson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{org}', '{pre_receive_hook_id}'), array($this->org, $this->preReceiveHookId), self::PATH), array('Content-Type' => 'application/json'), json_encode($data));
    }
    /**
     * @return Schema\OrgPreReceiveHook
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\OrgPreReceiveHook
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
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\OrgPreReceiveHook::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\OrgPreReceiveHook::class, $body);
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
