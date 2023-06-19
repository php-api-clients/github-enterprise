<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Projects;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListForRepo
{
    public const OPERATION_ID    = 'projects/list-for-repo';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/projects';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/projects';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Projects $hydrator)
    {
    }

    /** @return PromiseInterface<mixed> **/
    public function call(string $owner, string $repo, string $state = 'open', int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Projects\ListForRepo($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $state, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): mixed {
            return $operation->createResponse($response);
        });
    }
}
