<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\Release;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetReleaseByTag
{
    public const OPERATION_ID    = 'repos/get-release-by-tag';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/releases/tags/{tag}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/releases/tags/{tag}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Releases\Tags\Tag $hydrator)
    {
    }

    /** @return PromiseInterface<Release> **/
    public function call(string $owner, string $repo, string $tag): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\GetReleaseByTag($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $tag);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Release {
            return $operation->createResponse($response);
        });
    }
}
