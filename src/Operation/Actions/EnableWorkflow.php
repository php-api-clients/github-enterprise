<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Actions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;

use function str_replace;

final class EnableWorkflow
{
    public const OPERATION_ID    = 'actions/enable-workflow';
    public const OPERATION_MATCH = 'PUT /repos/{owner}/{repo}/actions/workflows/{workflow_id}/enable';
    private const METHOD         = 'PUT';
    private const PATH           = '/repos/{owner}/{repo}/actions/workflows/{workflow_id}/enable';
    private string $owner;
    private string $repo;
    /**The ID of the workflow. You can also pass the workflow file name as a string.**/
    private $workflowId;

    public function __construct(string $owner, string $repo, $workflowId)
    {
        $this->owner      = $owner;
        $this->repo       = $repo;
        $this->workflowId = $workflowId;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{workflow_id}'], [$this->owner, $this->repo, $this->workflowId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): ResponseInterface
    {
        return $response;
    }
}
