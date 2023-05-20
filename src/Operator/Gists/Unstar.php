<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Gists;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class Unstar
{
    public const OPERATION_ID    = 'gists/unstar';
    public const OPERATION_MATCH = 'DELETE /gists/{gist_id}/star';
    private const METHOD         = 'DELETE';
    private const PATH           = '/gists/{gist_id}/star';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Gists\GistId\Star $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(string $gistId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Gists\Unstar($this->responseSchemaValidator, $this->hydrator, $gistId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
