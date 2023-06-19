<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Teams;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteDiscussionCommentLegacy
{
    public const OPERATION_ID    = 'teams/delete-discussion-comment-legacy';
    public const OPERATION_MATCH = 'DELETE /teams/{team_id}/discussions/{discussion_number}/comments/{comment_number}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/teams/{team_id}/discussions/{discussion_number}/comments/{comment_number}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(int $teamId, int $discussionNumber, int $commentNumber): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Teams\DeleteDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
