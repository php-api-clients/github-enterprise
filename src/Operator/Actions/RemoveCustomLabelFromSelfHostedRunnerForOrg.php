<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class RemoveCustomLabelFromSelfHostedRunnerForOrg
{
    public const OPERATION_ID    = 'actions/remove-custom-label-from-self-hosted-runner-for-org';
    public const OPERATION_MATCH = 'DELETE /orgs/{org}/actions/runners/{runner_id}/labels/{name}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/orgs/{org}/actions/runners/{runner_id}/labels/{name}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Actions\Runners\RunnerId\Labels\Name $hydrator)
    {
    }

    /** @return */
    public function call(string $org, int $runnerId, string $name): Ok|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\RemoveCustomLabelFromSelfHostedRunnerForOrg($this->responseSchemaValidator, $this->hydrator, $org, $runnerId, $name);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
