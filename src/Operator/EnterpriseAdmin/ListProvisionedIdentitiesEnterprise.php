<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\ScimEnterpriseUserList;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListProvisionedIdentitiesEnterprise
{
    public const OPERATION_ID    = 'enterprise-admin/list-provisioned-identities-enterprise';
    public const OPERATION_MATCH = 'GET /scim/v2/Users';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Scim\V2\Users $hydrator)
    {
    }

    /** @return Schema\ScimEnterpriseUserList|array{code:int} */
    public function call(string $filter, string $excludedAttributes, int $startIndex = 1, int $count = 30): ScimEnterpriseUserList|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\ListProvisionedIdentitiesEnterprise($this->responseSchemaValidator, $this->hydrator, $filter, $excludedAttributes, $startIndex, $count);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ScimEnterpriseUserList|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
