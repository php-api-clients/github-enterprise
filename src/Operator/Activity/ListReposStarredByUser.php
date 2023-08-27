<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Activity;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\Repository;
use ApiClients\Client\GitHubEnterprise\Schema\StarredRepository;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListReposStarredByUser
{
    public const OPERATION_ID    = 'activity/list-repos-starred-by-user';
    public const OPERATION_MATCH = 'GET /users/{username}/starred';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Users\Username\Starred $hydrator)
    {
    }

    /** @return Schema\StarredRepository|Schema\Repository */
    public function call(string $username, string $sort = 'created', string $direction = 'desc', int $perPage = 30, int $page = 1): StarredRepository|Repository|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Activity\ListReposStarredByUser($this->responseSchemaValidator, $this->hydrator, $username, $sort, $direction, $perPage, $page);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): StarredRepository|Repository|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
