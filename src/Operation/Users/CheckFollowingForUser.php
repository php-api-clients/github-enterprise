<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Users;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class CheckFollowingForUser
{
    public const OPERATION_ID = 'users/check-following-for-user';
    public const OPERATION_MATCH = 'GET /users/{username}/following/{target_user}';
    private const METHOD = 'GET';
    private const PATH = '/users/{username}/following/{target_user}';
    /**The handle for the GitHub user account.**/
    private string $username;
    private string $targetUser;
    public function __construct(string $username, string $targetUser)
    {
        $this->username = $username;
        $this->targetUser = $targetUser;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{username}', '{target_user}'), array($this->username, $this->targetUser), self::PATH));
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Psr\Http\Message\ResponseInterface
    {
        return $response;
    }
}
