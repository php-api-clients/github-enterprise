<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Users;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\PrivateUser;
use ApiClients\Client\GitHubEnterprise\Schema\PublicUser;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetAuthenticated
{
    public const OPERATION_ID    = 'users/get-authenticated';
    public const OPERATION_MATCH = 'GET /user';
    private const METHOD         = 'GET';
    private const PATH           = '/user';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User $hydrator)
    {
    }

    /** @return (Schema\PrivateUser | Schema\PublicUser | array{code: int}) */
    public function call(): PrivateUser|PublicUser|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Users\GetAuthenticated($this->responseSchemaValidator, $this->hydrator);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): PrivateUser|PublicUser|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
