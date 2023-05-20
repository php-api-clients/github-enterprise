<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Activity;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;

use function str_replace;

final class ListReceivedEventsForUser
{
    public const OPERATION_ID    = 'activity/list-received-events-for-user';
    public const OPERATION_MATCH = 'GET /users/{username}/received_events';
    private const METHOD         = 'GET';
    private const PATH           = '/users/{username}/received_events';
    /**The handle for the GitHub user account. **/
    private string $username;
    /**The number of results per page (max 100). **/
    private int $perPage;
    /**Page number of the results to fetch. **/
    private int $page;

    public function __construct(string $username, int $perPage = 30, int $page = 1)
    {
        $this->username = $username;
        $this->perPage  = $perPage;
        $this->page     = $page;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{username}', '{per_page}', '{page}'], [$this->username, $this->perPage, $this->page], self::PATH . '?per_page={per_page}&page={page}'));
    }

    public function createResponse(ResponseInterface $response): ResponseInterface
    {
        return $response;
    }
}
