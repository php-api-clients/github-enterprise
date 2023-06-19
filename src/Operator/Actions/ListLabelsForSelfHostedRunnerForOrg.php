<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListLabelsForSelfHostedRunnerForOrg
{
    public const OPERATION_ID    = 'actions/list-labels-for-self-hosted-runner-for-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/actions/runners/{runner_id}/labels';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/actions/runners/{runner_id}/labels';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Actions\Runners\RunnerId\Labels $hydrator)
    {
    }

    /** @return PromiseInterface<Ok> **/
    public function call(string $org, int $runnerId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\ListLabelsForSelfHostedRunnerForOrg($this->responseSchemaValidator, $this->hydrator, $org, $runnerId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok {
            return $operation->createResponse($response);
        });
    }
}
