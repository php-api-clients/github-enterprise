<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Reactions;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListForTeamDiscussionCommentLegacy
{
    public const OPERATION_ID    = 'reactions/list-for-team-discussion-comment-legacy';
    public const OPERATION_MATCH = 'GET /teams/{team_id}/discussions/{discussion_number}/comments/{comment_number}/reactions';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Teams\TeamId\Discussions\DiscussionNumber\Comments\CommentNumber\Reactions $hydrator)
    {
    }

    /** @return Observable<Schema\Reaction> */
    public function call(int $teamId, int $discussionNumber, int $commentNumber, string $content, int $perPage = 30, int $page = 1): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Reactions\ListForTeamDiscussionCommentLegacy($this->responseSchemaValidator, $this->hydrator, $teamId, $discussionNumber, $commentNumber, $content, $perPage, $page);
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
