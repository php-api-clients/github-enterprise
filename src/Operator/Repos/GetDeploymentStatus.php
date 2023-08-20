<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\DeploymentStatus;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetDeploymentStatus
{
    public const OPERATION_ID    = 'repos/get-deployment-status';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/deployments/{deployment_id}/statuses/{status_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/deployments/{deployment_id}/statuses/{status_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Deployments\DeploymentId\Statuses\StatusId $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo, int $deploymentId, int $statusId): DeploymentStatus|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\GetDeploymentStatus($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $deploymentId, $statusId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): DeploymentStatus|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
