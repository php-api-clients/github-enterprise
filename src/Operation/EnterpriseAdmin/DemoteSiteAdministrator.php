<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;

use function str_replace;

final class DemoteSiteAdministrator
{
    public const OPERATION_ID    = 'enterprise-admin/demote-site-administrator';
    public const OPERATION_MATCH = 'DELETE /users/{username}/site_admin';
    private const METHOD         = 'DELETE';
    private const PATH           = '/users/{username}/site_admin';
    private string $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function createRequest(array $data = []): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{username}'], [$this->username], self::PATH));
    }

    public function createResponse(ResponseInterface $response): ResponseInterface
    {
        return $response;
    }
}
