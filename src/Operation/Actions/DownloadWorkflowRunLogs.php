<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class DownloadWorkflowRunLogs
{
    public const OPERATION_ID = 'actions/download-workflow-run-logs';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/actions/runs/{run_id}/logs';
    private const METHOD = 'GET';
    private const PATH = '/repos/{owner}/{repo}/actions/runs/{run_id}/logs';
    /**The account owner of the repository. The name is not case sensitive.**/
    private string $owner;
    /**The name of the repository. The name is not case sensitive.**/
    private string $repo;
    /**The unique identifier of the workflow run.**/
    private int $runId;
    public function __construct(string $owner, string $repo, int $runId)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->runId = $runId;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{owner}', '{repo}', '{run_id}'), array($this->owner, $this->repo, $this->runId), self::PATH));
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
