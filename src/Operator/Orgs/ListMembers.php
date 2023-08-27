<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Orgs;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListMembers
{
    public const OPERATION_ID    = 'orgs/list-members';
    public const OPERATION_MATCH = 'GET /orgs/{org}/members';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Members $hydrator)
    {
    }

    /** @return iterable<Schema\SimpleUser> */
    public function call(string $org, string $filter = 'all', string $role = 'all', int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Orgs\ListMembers($this->responseSchemaValidator, $this->hydrator, $org, $filter, $role, $perPage, $page);
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
