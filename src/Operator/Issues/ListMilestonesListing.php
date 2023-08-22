<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Issues;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListMilestonesListing
{
    public const OPERATION_ID    = 'issues/list-milestones';
    public const OPERATION_MATCH = 'LIST /repos/{owner}/{repo}/milestones';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/milestones';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Milestones $hydrator)
    {
    }

    /** @return iterable<Schema\Milestone> */
    public function call(string $owner, string $repo, string $state = 'open', string $sort = 'due_on', string $direction = 'asc', int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Issues\ListMilestonesListing($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $state, $sort, $direction, $perPage, $page);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
