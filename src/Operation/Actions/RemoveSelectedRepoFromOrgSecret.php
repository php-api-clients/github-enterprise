<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;

use function str_replace;

final class RemoveSelectedRepoFromOrgSecret
{
    public const OPERATION_ID    = 'actions/remove-selected-repo-from-org-secret';
    public const OPERATION_MATCH = 'DELETE /orgs/{org}/actions/secrets/{secret_name}/repositories/{repository_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/orgs/{org}/actions/secrets/{secret_name}/repositories/{repository_id}';
    private string $org;
    /**secret_name parameter**/
    private string $secretName;
    private int $repositoryId;

    public function __construct(string $org, string $secretName, int $repositoryId)
    {
        $this->org          = $org;
        $this->secretName   = $secretName;
        $this->repositoryId = $repositoryId;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{org}', '{secret_name}', '{repository_id}'], [$this->org, $this->secretName, $this->repositoryId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): ResponseInterface
    {
        return $response;
    }
}
