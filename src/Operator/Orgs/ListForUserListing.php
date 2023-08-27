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

final readonly class ListForUserListing
{
    public const OPERATION_ID    = 'orgs/list-for-user';
    public const OPERATION_MATCH = 'LIST /users/{username}/orgs';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Users\Username\Orgs $hydrator)
    {
    }

    /** @return iterable<Schema\OrganizationSimple> */
    public function call(string $username, int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Orgs\ListForUserListing($this->responseSchemaValidator, $this->hydrator, $username, $perPage, $page);
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
