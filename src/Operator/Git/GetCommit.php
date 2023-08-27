<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Git;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\GitCommit;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetCommit
{
    public const OPERATION_ID    = 'git/get-commit';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/git/commits/{commit_sha}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Git\Commits\CommitSha $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo, string $commitSha): GitCommit|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Git\GetCommit($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $commitSha);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): GitCommit|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
