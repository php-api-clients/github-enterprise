<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function str_replace;

final class DownloadJobLogsForWorkflowRun
{
    public const OPERATION_ID    = 'actions/download-job-logs-for-workflow-run';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/actions/jobs/{job_id}/logs';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/actions/jobs/{job_id}/logs';
    private string $owner;
    private string $repo;
    /**job_id parameter**/
    private int $jobId;

    public function __construct(string $owner, string $repo, int $jobId)
    {
        $this->owner = $owner;
        $this->repo  = $repo;
        $this->jobId = $jobId;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{job_id}'], [$this->owner, $this->repo, $this->jobId], self::PATH));
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
