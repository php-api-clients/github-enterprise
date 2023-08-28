<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operation\Actions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use React\Http\Browser;
use React\Stream\ReadableStreamInterface;
use RingCentral\Psr7\Request;
use RuntimeException;
use Rx\Observable;
use Rx\Subject\Subject;
use Throwable;

use function str_replace;

final class DownloadJobLogsForWorkflowRunStreaming
{
    public const OPERATION_ID    = 'actions/download-job-logs-for-workflow-run';
    public const OPERATION_MATCH = 'STREAM /repos/{owner}/{repo}/actions/jobs/{job_id}/logs';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/actions/jobs/{job_id}/logs';
    /**The account owner of the repository. The name is not case sensitive. **/
    private string $owner;
    /**The name of the repository without the `.git` extension. The name is not case sensitive. **/
    private string $repo;
    /**The unique identifier of the job. **/
    private int $jobId;

    public function __construct(private readonly Browser $browser, string $owner, string $repo, int $jobId)
    {
        $this->owner = $owner;
        $this->repo  = $repo;
        $this->jobId = $jobId;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{job_id}'], [$this->owner, $this->repo, $this->jobId], self::PATH));
    }

    /** @return Observable<string> */
    public function createResponse(ResponseInterface $response): Observable
    {
        $code = $response->getStatusCode();
        switch ($code) {
            /**
             * Response
             **/
            case 302:
                $stream = new Subject();
                $this->browser->requestStreaming('GET', $response->getHeaderLine('location'))->then(static function (ResponseInterface $response) use ($stream): void {
                    $body = $response->getBody();
                    if (! ($body instanceof StreamInterface && $body instanceof ReadableStreamInterface)) {
                        $stream->onError(new RuntimeException());

                        return;
                    }

                    $body->on('data', static function (string $data) use ($stream): void {
                        $stream->onNext($data);
                    });
                    $body->on('close', static function () use ($stream): void {
                        $stream->onCompleted();
                    });
                    $body->on('error', static function (Throwable $error) use ($stream): void {
                        $stream->onError($error);
                    });
                });

                return $stream;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
