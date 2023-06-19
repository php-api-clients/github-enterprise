<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Users;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListFollowersForAuthenticatedUser
{
    public const OPERATION_ID    = 'users/list-followers-for-authenticated-user';
    public const OPERATION_MATCH = 'GET /user/followers';
    private const METHOD         = 'GET';
    private const PATH           = '/user/followers';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\Followers $hydrator)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Users\ListFollowersForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
