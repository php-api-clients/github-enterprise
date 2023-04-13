<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Repos;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class DownloadTarballArchive
{
    public const OPERATION_ID = 'repos/download-tarball-archive';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/tarball/{ref}';
    private const METHOD = 'GET';
    private const PATH = '/repos/{owner}/{repo}/tarball/{ref}';
    /**The account owner of the repository. The name is not case sensitive.**/
    private string $owner;
    /**The name of the repository. The name is not case sensitive.**/
    private string $repo;
    private string $ref;
    public function __construct(string $owner, string $repo, string $ref)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->ref = $ref;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{owner}', '{repo}', '{ref}'), array($this->owner, $this->repo, $this->ref), self::PATH));
    }
    /**
     * @return array{code: int,location: string}
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : array
    {
        $code = $response->getStatusCode();
        switch ($code) {
            /**
             * Response
            **/
            case 302:
                return array('code' => 302, 'location' => $response->getHeaderLine('Location'));
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
