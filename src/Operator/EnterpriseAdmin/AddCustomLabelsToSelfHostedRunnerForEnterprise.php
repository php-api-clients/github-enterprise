<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class AddCustomLabelsToSelfHostedRunnerForEnterprise
{
    public const OPERATION_ID    = 'enterprise-admin/add-custom-labels-to-self-hosted-runner-for-enterprise';
    public const OPERATION_MATCH = 'POST /enterprises/{enterprise}/actions/runners/{runner_id}/labels';
    private const METHOD         = 'POST';
    private const PATH           = '/enterprises/{enterprise}/actions/runners/{runner_id}/labels';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Enterprises\Enterprise\Actions\Runners\RunnerId\Labels $hydrator)
    {
    }

    /** @return */
    public function call(string $enterprise, int $runnerId, array $params): Ok|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\AddCustomLabelsToSelfHostedRunnerForEnterprise($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $enterprise, $runnerId);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
