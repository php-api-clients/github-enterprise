<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Repos;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class CreateDeploymentBranchPolicy
{
    public const OPERATION_ID = 'repos/create-deployment-branch-policy';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/environments/{environment_name}/deployment-branch-policies';
    private const METHOD = 'POST';
    private const PATH = '/repos/{owner}/{repo}/environments/{environment_name}/deployment-branch-policies';
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    /**The account owner of the repository. The name is not case sensitive.**/
    private string $owner;
    /**The name of the repository. The name is not case sensitive.**/
    private string $repo;
    /**The name of the environment.**/
    private string $environmentName;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Environments\CbEnvironmentNameRcb\DeploymentDashBranchDashPolicies $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Environments\CbEnvironmentNameRcb\DeploymentDashBranchDashPolicies $hydrator, string $owner, string $repo, string $environmentName)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->owner = $owner;
        $this->repo = $repo;
        $this->environmentName = $environmentName;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        $this->requestSchemaValidator->validate($data, \cebe\openapi\Reader::readFromJson(Schema\DeploymentBranchPolicyNamePattern::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{owner}', '{repo}', '{environment_name}'), array($this->owner, $this->repo, $this->environmentName), self::PATH), array('Content-Type' => 'application/json'), json_encode($data));
    }
    /**
     * @return Schema\DeploymentBranchPolicy
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\DeploymentBranchPolicy
    {
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        $body = json_decode($response->getBody()->getContents(), true);
        switch ($response->getStatusCode()) {
            /**Response**/
            case 200:
                switch ($contentType) {
                    case 'application/json':
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\DeploymentBranchPolicy::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\DeploymentBranchPolicy::class, $body);
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
