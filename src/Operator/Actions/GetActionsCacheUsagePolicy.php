<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\ActionsCacheUsagePolicyForRepository;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetActionsCacheUsagePolicy
{
    public const OPERATION_ID    = 'actions/get-actions-cache-usage-policy';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/actions/cache/usage-policy';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/actions/cache/usage-policy';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Actions\Cache\UsagePolicy $hydrator)
    {
    }

    /** @return PromiseInterface<ActionsCacheUsagePolicyForRepository> **/
    public function call(string $owner, string $repo): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\GetActionsCacheUsagePolicy($this->responseSchemaValidator, $this->hydrator, $owner, $repo);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ActionsCacheUsagePolicyForRepository {
            return $operation->createResponse($response);
        });
    }
}
