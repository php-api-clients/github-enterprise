<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class UpdateAttributeForEnterpriseUser
{
    public const OPERATION_ID    = 'enterprise-admin/update-attribute-for-enterprise-user';
    public const OPERATION_MATCH = 'PATCH /scim/v2/Users/{scim_user_id}';
    private const METHOD         = 'PATCH';
    private const PATH           = '/scim/v2/Users/{scim_user_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Scim\V2\Users\ScimUserId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(string $scimUserId, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\UpdateAttributeForEnterpriseUser($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $scimUserId);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
