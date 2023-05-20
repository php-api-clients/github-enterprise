<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Teams;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\TeamFull;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetByName
{
    public const OPERATION_ID    = 'teams/get-by-name';
    public const OPERATION_MATCH = 'GET /orgs/{org}/teams/{team_slug}';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/teams/{team_slug}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Teams\TeamSlug $hydrator)
    {
    }

    /**
     * @return PromiseInterface<TeamFull>
     **/
    public function call(string $org, string $teamSlug): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Teams\GetByName($this->responseSchemaValidator, $this->hydrator, $org, $teamSlug);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): TeamFull {
            return $operation->createResponse($response);
        });
    }
}
