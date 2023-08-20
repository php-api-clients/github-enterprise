<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class UpdateEnvironmentVariable
{
    public const OPERATION_ID    = 'actions/update-environment-variable';
    public const OPERATION_MATCH = 'PATCH /repositories/{repository_id}/environments/{environment_name}/variables/{name}';
    private const METHOD         = 'PATCH';
    private const PATH           = '/repositories/{repository_id}/environments/{environment_name}/variables/{name}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator)
    {
    }

    /** @return array{code: int} */
    public function call(int $repositoryId, string $name, string $environmentName, array $params): array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\UpdateEnvironmentVariable($this->requestSchemaValidator, $repositoryId, $name, $environmentName);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
