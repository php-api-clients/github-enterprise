<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Activity;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema\RepositorySubscription;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;
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

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\Subscription $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo): RepositorySubscription|WithoutBody
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Activity\GetRepoSubscription($this->responseSchemaValidator, $this->hydrator, $owner, $repo);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): RepositorySubscription|WithoutBody {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
