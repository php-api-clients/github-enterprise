<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Checks;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\CheckSuite;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetSuite
{
    public const OPERATION_ID    = 'checks/get-suite';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/check-suites/{check_suite_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\CheckSuites\CheckSuiteId $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo, int $checkSuiteId): CheckSuite|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Checks\GetSuite($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $checkSuiteId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): CheckSuite|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
