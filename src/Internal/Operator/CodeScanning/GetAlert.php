<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\CodeScanning;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningAlert;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetAlert
{
    public const OPERATION_ID    = 'code-scanning/get-alert';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/code-scanning/alerts/{alert_number}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\CodeScanning\Alerts\AlertNumber $hydrator)
    {
    }

    public function call(string $owner, string $repo, int $alertNumber): CodeScanningAlert
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\CodeScanning\GetAlert($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $alertNumber);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): CodeScanningAlert {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
