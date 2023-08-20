<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\EnterpriseAdmin;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class DisableSelectedOrganizationGithubActionsEnterprise
{
    public const OPERATION_ID    = 'enterprise-admin/disable-selected-organization-github-actions-enterprise';
    public const OPERATION_MATCH = 'DELETE /enterprises/{enterprise}/actions/permissions/organizations/{org_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/enterprises/{enterprise}/actions/permissions/organizations/{org_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return array{code: int} */
    public function call(string $enterprise, int $orgId): array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\DisableSelectedOrganizationGithubActionsEnterprise($enterprise, $orgId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
