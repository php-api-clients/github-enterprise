<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\DeploymentBranchPolicy;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class CreateDeploymentBranchPolicy
{
    public const OPERATION_ID    = 'repos/create-deployment-branch-policy';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/environments/{environment_name}/deployment-branch-policies';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/environments/{environment_name}/deployment-branch-policies';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Environments\EnvironmentName\DeploymentBranchPolicies $hydrator)
    {
    }

    /** @return PromiseInterface<(DeploymentBranchPolicy|array)> **/
    public function call(string $owner, string $repo, string $environmentName, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\CreateDeploymentBranchPolicy($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $environmentName);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): DeploymentBranchPolicy|array {
            return $operation->createResponse($response);
        });
    }
}
