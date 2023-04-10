<?php

declare (strict_types=1);
namespace ApiClients\Client\Github\Operation\EnterpriseAdmin;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
final class UpdatePreReceiveHookEnforcementForRepo
{
    public const OPERATION_ID = 'enterprise-admin/update-pre-receive-hook-enforcement-for-repo';
    public const OPERATION_MATCH = 'PATCH /repos/{owner}/{repo}/pre-receive-hooks/{pre_receive_hook_id}';
    private const METHOD = 'PATCH';
    private const PATH = '/repos/{owner}/{repo}/pre-receive-hooks/{pre_receive_hook_id}';
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    /**The account owner of the repository. The name is not case sensitive.**/
    private string $owner;
    /**The name of the repository. The name is not case sensitive.**/
    private string $repo;
    /**The unique identifier of the pre-receive hook.**/
    private int $preReceiveHookId;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb $hydrator, string $owner, string $repo, int $preReceiveHookId)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->owner = $owner;
        $this->repo = $repo;
        $this->preReceiveHookId = $preReceiveHookId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        $this->requestSchemaValidator->validate($data, \cebe\openapi\Reader::readFromJson(Schema\EnterpriseAdmin\UpdatePreReceiveHookEnforcementForRepo\Request\Applicationjson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{owner}', '{repo}', '{pre_receive_hook_id}'), array($this->owner, $this->repo, $this->preReceiveHookId), self::PATH), array('Content-Type' => 'application/json'), json_encode($data));
    }
    /**
     * @return Schema\RepositoryPreReceiveHook
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\RepositoryPreReceiveHook
    {
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        $body = json_decode($response->getBody()->getContents(), true);
        switch ($response->getStatusCode()) {
            /**Response**/
            case 200:
                switch ($contentType) {
                    case 'application/json':
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\RepositoryPreReceiveHook::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\RepositoryPreReceiveHook::class, $body);
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
