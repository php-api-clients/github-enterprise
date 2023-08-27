<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Projects;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\Projects\MoveColumn\Response\ApplicationJson\Created\Application\Json;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class MoveColumn
{
    public const OPERATION_ID    = 'projects/move-column';
    public const OPERATION_MATCH = 'POST /projects/columns/{column_id}/moves';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Projects\Columns\ColumnId\Moves $hydrator)
    {
    }

    /** @return Schema\Operations\Projects\MoveColumn\Response\ApplicationJson\Created\Application\Json|array{code:int} */
    public function call(int $columnId, array $params): Json|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Projects\MoveColumn($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $columnId);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Json|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
