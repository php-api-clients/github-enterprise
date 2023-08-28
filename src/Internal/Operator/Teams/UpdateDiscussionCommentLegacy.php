<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Teams;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\TeamDiscussionComment;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class UpdateDiscussionCommentLegacy
{
    public const OPERATION_ID    = 'teams/update-discussion-comment-legacy';
    public const OPERATION_MATCH = 'PATCH /teams/{team_id}/discussions/{discussion_number}/comments/{comment_number}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Teams\TeamId\Discussions\DiscussionNumber\Comments\CommentNumber $hydrator)
    {
    }

    /** @return Schema\TeamDiscussionComment */
    public function call(int $teamId, int $discussionNumber, int $commentNumber, array $params): TeamDiscussionComment|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Teams\UpdateDiscussionCommentLegacy($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $teamId, $discussionNumber, $commentNumber);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): TeamDiscussionComment|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
