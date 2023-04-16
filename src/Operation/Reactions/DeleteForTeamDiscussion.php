<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Reactions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;

use function str_replace;

final class DeleteForTeamDiscussion
{
    public const OPERATION_ID    = 'reactions/delete-for-team-discussion';
    public const OPERATION_MATCH = 'DELETE /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/reactions/{reaction_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/reactions/{reaction_id}';
    /**The organization name. The name is not case sensitive.**/
    private string $org;
    /**The slug of the team name.**/
    private string $teamSlug;
    /**The number that identifies the discussion.**/
    private int $discussionNumber;
    /**The unique identifier of the reaction.**/
    private int $reactionId;

    public function __construct(string $org, string $teamSlug, int $discussionNumber, int $reactionId)
    {
        $this->org              = $org;
        $this->teamSlug         = $teamSlug;
        $this->discussionNumber = $discussionNumber;
        $this->reactionId       = $reactionId;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{org}', '{team_slug}', '{discussion_number}', '{reaction_id}'], [$this->org, $this->teamSlug, $this->discussionNumber, $this->reactionId], self::PATH));
    }

    public function createResponse(ResponseInterface $response): ResponseInterface
    {
        return $response;
    }
}
