<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListCommitsListing
{
    public const OPERATION_ID    = 'repos/list-commits';
    public const OPERATION_MATCH = 'LIST /repos/{owner}/{repo}/commits';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/commits';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Commits $hydrator)
    {
    }

    /** @return Observable<Schema\Commit> */
    public function call(string $owner, string $repo, string $sha, string $path, string $author, string $committer, string $since, string $until, int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\ListCommitsListing($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $sha, $path, $author, $committer, $since, $until, $perPage, $page);
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
