<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Gists;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\GistComment;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class CreateComment
{
    public const OPERATION_ID    = 'gists/create-comment';
    public const OPERATION_MATCH = 'POST /gists/{gist_id}/comments';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Gists\GistId\Comments $hydrator)
    {
    }

    /** @return Schema\GistComment|array{code:int} */
    public function call(string $gistId, array $params): GistComment|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Gists\CreateComment($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $gistId);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): GistComment|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
