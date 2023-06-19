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
use function str_replace;

final class RemovePreReceiveHookEnforcementForRepo
{
    public const OPERATION_ID    = 'enterprise-admin/remove-pre-receive-hook-enforcement-for-repo';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/pre-receive-hooks/{pre_receive_hook_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/pre-receive-hooks/{pre_receive_hook_id}';
    /**The account owner of the repository. The name is not case sensitive. **/
    private string $owner;
    /**The name of the repository without the `.git` extension. The name is not case sensitive. **/
    private string $repo;
    /**The unique identifier of the pre-receive hook. **/
    private int $preReceiveHookId;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Hydrator\Operation\Repos\Owner\Repo\PreReceiveHooks\PreReceiveHookId $hydrator, string $owner, string $repo, int $preReceiveHookId)
    {
        $this->owner            = $owner;
        $this->repo             = $repo;
        $this->preReceiveHookId = $preReceiveHookId;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{pre_receive_hook_id}'], [$this->owner, $this->repo, $this->preReceiveHookId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): Schema\RepositoryPreReceiveHook
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Responds with effective values inherited from owner and/or global level.
                     **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\RepositoryPreReceiveHook::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\RepositoryPreReceiveHook::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
