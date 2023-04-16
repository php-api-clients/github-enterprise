<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;

use function str_replace;

final class DeleteRepoSecret
{
    public const OPERATION_ID    = 'actions/delete-repo-secret';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/actions/secrets/{secret_name}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/actions/secrets/{secret_name}';
    private string $owner;
    private string $repo;
    /**secret_name parameter**/
    private string $secretName;

    public function __construct(string $owner, string $repo, string $secretName)
    {
        $this->owner      = $owner;
        $this->repo       = $repo;
        $this->secretName = $secretName;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{secret_name}'], [$this->owner, $this->repo, $this->secretName], self::PATH));
    }

    public function createResponse(ResponseInterface $response): ResponseInterface
    {
        return $response;
    }
}
