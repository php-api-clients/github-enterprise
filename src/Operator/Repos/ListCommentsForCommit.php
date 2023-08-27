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

final readonly class ListCommentsForCommit
{
    public const OPERATION_ID    = 'repos/list-comments-for-commit';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/commits/{commit_sha}/comments';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Commits\CommitSha\Comments $hydrator)
    {
    }

    /** @return iterable<Schema\CommitComment> */
    public function call(string $owner, string $repo, string $commitSha, int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\ListCommentsForCommit($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $commitSha, $perPage, $page);
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
