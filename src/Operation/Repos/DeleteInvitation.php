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
final class DeleteInvitation
{
    public const OPERATION_ID = 'repos/delete-invitation';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/invitations/{invitation_id}';
    private const METHOD = 'DELETE';
    private const PATH = '/repos/{owner}/{repo}/invitations/{invitation_id}';
    /**The account owner of the repository. The name is not case sensitive.**/
    private string $owner;
    /**The name of the repository. The name is not case sensitive.**/
    private string $repo;
    /**The unique identifier of the invitation.**/
    private int $invitationId;
    public function __construct(string $owner, string $repo, int $invitationId)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->invitationId = $invitationId;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{owner}', '{repo}', '{invitation_id}'), array($this->owner, $this->repo, $this->invitationId), self::PATH));
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Psr\Http\Message\ResponseInterface
    {
        return $response;
    }
}
