<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Repos;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function str_replace;

final class DownloadZipballArchive
{
    public const OPERATION_ID    = 'repos/download-zipball-archive';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/zipball/{ref}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/zipball/{ref}';
    private string $owner;
    private string $repo;
    private string $ref;

    public function __construct(string $owner, string $repo, string $ref)
    {
        $this->owner = $owner;
        $this->repo  = $repo;
        $this->ref   = $ref;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{ref}'], [$this->owner, $this->repo, $this->ref], self::PATH));
    }

    /**
     * @return array{code: int,location: string}
     */
    public function createResponse(ResponseInterface $response): array
    {
        $code = $response->getStatusCode();
        switch ($code) {
            /**
             * Response
            **/
            case 302:
                return ['code' => 302, 'location' => $response->getHeaderLine('Location')];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
