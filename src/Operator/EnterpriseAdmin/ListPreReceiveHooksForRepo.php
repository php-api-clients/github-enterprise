<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\EnterpriseAdmin;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListPreReceiveHooksForRepo
{
    public const OPERATION_ID    = 'enterprise-admin/list-pre-receive-hooks-for-repo';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/pre-receive-hooks';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/pre-receive-hooks';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /**
     * @return PromiseInterface<ResponseInterface>
     **/
    public function call(string $owner, string $repo, int $perPage = 30, int $page = 1, string $direction = 'desc', string $sort = 'created'): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\ListPreReceiveHooksForRepo($owner, $repo, $perPage, $page, $direction, $sort);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ResponseInterface {
            return $operation->createResponse($response);
        });
    }
}
