<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema\RepositoryRuleset;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetOrgRuleset
{
    public const OPERATION_ID    = 'repos/get-org-ruleset';
    public const OPERATION_MATCH = 'GET /orgs/{org}/rulesets/{ruleset_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Orgs\Org\Rulesets\RulesetId $hydrator)
    {
    }

    public function call(string $org, int $rulesetId): RepositoryRuleset
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Repos\GetOrgRuleset($this->responseSchemaValidator, $this->hydrator, $org, $rulesetId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): RepositoryRuleset {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
