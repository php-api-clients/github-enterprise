<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Activity;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\RepositorySubscription;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetRepoSubscription
{
    public const OPERATION_ID    = 'activity/get-repo-subscription';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/subscription';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/subscription';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Subscription $hydrator)
    {
    }

    /** @return (Schema\RepositorySubscription | array{code: int}) */
    public function call(string $owner, string $repo): RepositorySubscription|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Activity\GetRepoSubscription($this->responseSchemaValidator, $this->hydrator, $owner, $repo);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): RepositorySubscription|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
