<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class RemoveSelectedRepoFromOrgSecret
{
    public const OPERATION_ID    = 'actions/remove-selected-repo-from-org-secret';
    public const OPERATION_MATCH = 'DELETE /orgs/{org}/actions/secrets/{secret_name}/repositories/{repository_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/orgs/{org}/actions/secrets/{secret_name}/repositories/{repository_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(string $org, string $secretName, int $repositoryId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\RemoveSelectedRepoFromOrgSecret($org, $secretName, $repositoryId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
