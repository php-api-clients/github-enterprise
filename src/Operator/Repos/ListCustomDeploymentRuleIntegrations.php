<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\Repos\ListCustomDeploymentRuleIntegrations\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListCustomDeploymentRuleIntegrations
{
    public const OPERATION_ID    = 'repos/list-custom-deployment-rule-integrations';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/environments/{environment_name}/deployment_protection_rules/apps';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/environments/{environment_name}/deployment_protection_rules/apps';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Environments\EnvironmentName\DeploymentProtectionRules\Apps $hydrator)
    {
    }

    /** @return */
    public function call(string $environmentName, string $repo, string $owner, int $page = 1, int $perPage = 30): Ok|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\ListCustomDeploymentRuleIntegrations($this->responseSchemaValidator, $this->hydrator, $environmentName, $repo, $owner, $page, $perPage);
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
