<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Issues;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class DeleteLabel
{
    public const OPERATION_ID = 'issues/delete-label';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/labels/{name}';
    private const METHOD = 'DELETE';
    private const PATH = '/repos/{owner}/{repo}/labels/{name}';
    /**The account owner of the repository. The name is not case sensitive.**/
    private string $owner;
    /**The name of the repository. The name is not case sensitive.**/
    private string $repo;
    private string $name;
    public function __construct(string $owner, string $repo, string $name)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->name = $name;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{owner}', '{repo}', '{name}'), array($this->owner, $this->repo, $this->name), self::PATH));
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Psr\Http\Message\ResponseInterface
    {
        return $response;
    }
}
