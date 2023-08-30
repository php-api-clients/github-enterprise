<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\OauthAuthorizations;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema\Authorization;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetOrCreateAuthorizationForAppAndFingerprint
{
    public const OPERATION_ID    = 'oauth-authorizations/get-or-create-authorization-for-app-and-fingerprint';
    public const OPERATION_MATCH = 'PUT /authorizations/clients/{client_id}/{fingerprint}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Authorizations\Clients\ClientId\Fingerprint $hydrator)
    {
    }

    /** @return */
    public function call(string $clientId, string $fingerprint, array $params): Authorization|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\OauthAuthorizations\GetOrCreateAuthorizationForAppAndFingerprint($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $clientId, $fingerprint);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Authorization|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
