<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Repos;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class CreateUsingTemplate
{
    public const OPERATION_ID = 'repos/create-using-template';
    public const OPERATION_MATCH = 'POST /repos/{template_owner}/{template_repo}/generate';
    private const METHOD = 'POST';
    private const PATH = '/repos/{template_owner}/{template_repo}/generate';
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    private string $templateOwner;
    private string $templateRepo;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbTemplateOwnerRcb\CbTemplateRepoRcb\Generate $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbTemplateOwnerRcb\CbTemplateRepoRcb\Generate $hydrator, string $templateOwner, string $templateRepo)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->templateOwner = $templateOwner;
        $this->templateRepo = $templateRepo;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        $this->requestSchemaValidator->validate($data, \cebe\openapi\Reader::readFromJson(Schema\Repos\CreateUsingTemplate\Request\Applicationjson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{template_owner}', '{template_repo}'), array($this->templateOwner, $this->templateRepo), self::PATH), array('Content-Type' => 'application/json'), json_encode($data));
    }
    /**
     * @return Schema\Repository
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\Repository
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
                    case 201:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\Repository::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\Repository::class, $body);
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
