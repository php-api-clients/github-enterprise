<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Meta;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class GetOctocat
{
    public const OPERATION_ID = 'meta/get-octocat';
    public const OPERATION_MATCH = 'GET /octocat';
    private const METHOD = 'GET';
    private const PATH = '/octocat';
    /**The words to show in Octocat's speech bubble**/
    private string $s;
    public function __construct(string $s)
    {
        $this->s = $s;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{s}'), array($this->s), self::PATH . '?s={s}'));
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Psr\Http\Message\ResponseInterface
    {
        return $response;
    }
}
