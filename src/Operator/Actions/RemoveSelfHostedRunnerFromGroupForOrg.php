<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class RemoveSelfHostedRunnerFromGroupForOrg
{
    public const OPERATION_ID    = 'actions/remove-self-hosted-runner-from-group-for-org';
    public const OPERATION_MATCH = 'DELETE /orgs/{org}/actions/runner-groups/{runner_group_id}/runners/{runner_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/orgs/{org}/actions/runner-groups/{runner_group_id}/runners/{runner_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return array{code: int} */
    public function call(string $org, int $runnerGroupId, int $runnerId): array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\RemoveSelfHostedRunnerFromGroupForOrg($org, $runnerGroupId, $runnerId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
