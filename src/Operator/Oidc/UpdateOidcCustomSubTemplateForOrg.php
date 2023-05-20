<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Oidc;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\EmptyObject;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class UpdateOidcCustomSubTemplateForOrg
{
    public const OPERATION_ID    = 'oidc/update-oidc-custom-sub-template-for-org';
    public const OPERATION_MATCH = 'PUT /orgs/{org}/actions/oidc/customization/sub';
    private const METHOD         = 'PUT';
    private const PATH           = '/orgs/{org}/actions/oidc/customization/sub';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Actions\Oidc\Customization\Sub $hydrator)
    {
    }

    /**
     * @return PromiseInterface<EmptyObject>
     **/
    public function call(string $org, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Oidc\UpdateOidcCustomSubTemplateForOrg($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $org);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): EmptyObject {
            return $operation->createResponse($response);
        });
    }
}
