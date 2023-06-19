<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteWorkflowRunLogs
{
    public const OPERATION_ID    = 'actions/delete-workflow-run-logs';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/actions/runs/{run_id}/logs';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/actions/runs/{run_id}/logs';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Actions\Runs\RunId\Logs $hydrator)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(string $owner, string $repo, int $runId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\DeleteWorkflowRunLogs($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $runId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
