<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Orgs;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class SetPublicMembershipForAuthenticatedUser
{
    public const OPERATION_ID    = 'orgs/set-public-membership-for-authenticated-user';
    public const OPERATION_MATCH = 'PUT /orgs/{org}/public_members/{username}';
    private const METHOD         = 'PUT';
    private const PATH           = '/orgs/{org}/public_members/{username}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\PublicMembers\Username $hydrator)
    {
    }

    /** @return array{code: int} */
    public function call(string $org, string $username): array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Orgs\SetPublicMembershipForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $org, $username);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
