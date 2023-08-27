<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Pulls;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListListing
{
    public const OPERATION_ID    = 'pulls/list';
    public const OPERATION_MATCH = 'LIST /repos/{owner}/{repo}/pulls';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Pulls $hydrator)
    {
    }

    /** @return iterable<Schema\PullRequestSimple>|array{code:int} */
    public function call(string $owner, string $repo, string $head, string $base, string $direction, string $state = 'open', string $sort = 'created', int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Pulls\ListListing($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $head, $base, $direction, $state, $sort, $perPage, $page);
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
