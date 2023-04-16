<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Repos;

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

final class GetPagesBuild
{
    public const OPERATION_ID    = 'repos/get-pages-build';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/pages/builds/{build_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/pages/builds/{build_id}';
    private string $owner;
    private string $repo;
    private int $buildId;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Pages\Builds\CbBuildIdRcb $hydrator;

    public function __construct(SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Pages\Builds\CbBuildIdRcb $hydrator, string $owner, string $repo, int $buildId)
    {
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->buildId                 = $buildId;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{build_id}'], [$this->owner, $this->repo, $this->buildId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\PageBuild
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
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\PageBuild::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));

                        return $this->hydrator->hydrateObject(Schema\PageBuild::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
