<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\OauthAuthorizations;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListGrants
{
    public const OPERATION_ID    = 'oauth-authorizations/list-grants';
    public const OPERATION_MATCH = 'GET /applications/grants';
    private const METHOD         = 'GET';
    private const PATH           = '/applications/grants';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Applications\Grants $hydrator)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(string $clientId, int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\OauthAuthorizations\ListGrants($this->responseSchemaValidator, $this->hydrator, $clientId, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
