<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Teams;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListProjectsInOrgListing
{
    public const OPERATION_ID    = 'teams/list-projects-in-org';
    public const OPERATION_MATCH = 'LIST /orgs/{org}/teams/{team_slug}/projects';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/teams/{team_slug}/projects';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Teams\TeamSlug\Projects $hydrator)
    {
    }

    /** @return Observable<Schema\TeamProject> */
    public function call(string $org, string $teamSlug, int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Teams\ListProjectsInOrgListing($this->responseSchemaValidator, $this->hydrator, $org, $teamSlug, $perPage, $page);
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
