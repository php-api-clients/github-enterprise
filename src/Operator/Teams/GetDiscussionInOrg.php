<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Teams;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussion;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetDiscussionInOrg
{
    public const OPERATION_ID    = 'teams/get-discussion-in-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Teams\TeamSlug\Discussions\DiscussionNumber $hydrator)
    {
    }

    /** @return */
    public function call(string $org, string $teamSlug, int $discussionNumber): TeamDiscussion|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Teams\GetDiscussionInOrg($this->responseSchemaValidator, $this->hydrator, $org, $teamSlug, $discussionNumber);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): TeamDiscussion|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
