<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Teams;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\TeamMembership;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetMembershipForUserLegacy
{
    public const OPERATION_ID    = 'teams/get-membership-for-user-legacy';
    public const OPERATION_MATCH = 'GET /teams/{team_id}/memberships/{username}';
    private const METHOD         = 'GET';
    private const PATH           = '/teams/{team_id}/memberships/{username}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Teams\TeamId\Memberships\Username $hydrator)
    {
    }

    /**
     * @return PromiseInterface<TeamMembership>
     **/
    public function call(int $teamId, string $username): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Teams\GetMembershipForUserLegacy($this->responseSchemaValidator, $this->hydrator, $teamId, $username);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): TeamMembership {
            return $operation->createResponse($response);
        });
    }
}
