<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Apps;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class AddRepoToInstallationForAuthenticatedUser
{
    public const OPERATION_ID    = 'apps/add-repo-to-installation-for-authenticated-user';
    public const OPERATION_MATCH = 'PUT /user/installations/{installation_id}/repositories/{repository_id}';
    private const METHOD         = 'PUT';
    private const PATH           = '/user/installations/{installation_id}/repositories/{repository_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\Installations\InstallationId\Repositories\RepositoryId $hydrator)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(int $installationId, int $repositoryId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Apps\AddRepoToInstallationForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $installationId, $repositoryId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
