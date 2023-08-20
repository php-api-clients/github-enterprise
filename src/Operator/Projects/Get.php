<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Projects;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\Project;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class Get
{
    public const OPERATION_ID    = 'projects/get';
    public const OPERATION_MATCH = 'GET /projects/{project_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/projects/{project_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Projects\ProjectId $hydrator)
    {
    }

    /** @return (Schema\Project | array{code: int}) */
    public function call(int $projectId): Project|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Projects\Get($this->responseSchemaValidator, $this->hydrator, $projectId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Project|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
