<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Actions;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\Actions\ListRepoAccessToSelfHostedRunnerGroupInOrg\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListRepoAccessToSelfHostedRunnerGroupInOrg
{
    public const OPERATION_ID    = 'actions/list-repo-access-to-self-hosted-runner-group-in-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/actions/runner-groups/{runner_group_id}/repositories';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Orgs\Org\Actions\RunnerGroups\RunnerGroupId\Repositories $hydrator)
    {
    }

    /** @return */
    public function call(string $org, int $runnerGroupId, int $page = 1, int $perPage = 30): Ok|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Actions\ListRepoAccessToSelfHostedRunnerGroupInOrg($this->responseSchemaValidator, $this->hydrator, $org, $runnerGroupId, $page, $perPage);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
