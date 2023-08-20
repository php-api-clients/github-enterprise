<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Reactions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\Reaction;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class CreateForTeamDiscussionCommentInOrg
{
    public const OPERATION_ID    = 'reactions/create-for-team-discussion-comment-in-org';
    public const OPERATION_MATCH = 'POST /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/comments/{comment_number}/reactions';
    private const METHOD         = 'POST';
    private const PATH           = '/orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/comments/{comment_number}/reactions';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Teams\TeamSlug\Discussions\DiscussionNumber\Comments\CommentNumber\Reactions $hydrator)
    {
    }

    /** @return */
    public function call(string $org, string $teamSlug, int $discussionNumber, int $commentNumber, array $params): Reaction|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Reactions\CreateForTeamDiscussionCommentInOrg($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $org, $teamSlug, $discussionNumber, $commentNumber);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Reaction|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
