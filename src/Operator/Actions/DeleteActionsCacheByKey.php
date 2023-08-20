<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\ActionsCacheList;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class DeleteActionsCacheByKey
{
    public const OPERATION_ID    = 'actions/delete-actions-cache-by-key';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/actions/caches';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/actions/caches';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Actions\Caches $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo, string $key, string $ref): ActionsCacheList|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\DeleteActionsCacheByKey($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $key, $ref);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ActionsCacheList|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
