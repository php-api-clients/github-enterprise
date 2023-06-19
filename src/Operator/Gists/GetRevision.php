<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Gists;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\GistSimple;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetRevision
{
    public const OPERATION_ID    = 'gists/get-revision';
    public const OPERATION_MATCH = 'GET /gists/{gist_id}/{sha}';
    private const METHOD         = 'GET';
    private const PATH           = '/gists/{gist_id}/{sha}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Gists\GistId\Sha $hydrator)
    {
    }

    /** @return PromiseInterface<GistSimple> **/
    public function call(string $gistId, string $sha): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Gists\GetRevision($this->responseSchemaValidator, $this->hydrator, $gistId, $sha);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): GistSimple {
            return $operation->createResponse($response);
        });
    }
}
