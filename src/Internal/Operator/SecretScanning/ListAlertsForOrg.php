<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\SecretScanning;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListAlertsForOrg
{
    public const OPERATION_ID    = 'secret-scanning/list-alerts-for-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/secret-scanning/alerts';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Orgs\Org\SecretScanning\Alerts $hydrator)
    {
    }

    /** @return Observable<Schema\OrganizationSecretScanningAlert> */
    public function call(string $org, string $state, string $secretType, string $resolution, int $page = 1, int $perPage = 30): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\SecretScanning\ListAlertsForOrg($this->responseSchemaValidator, $this->hydrator, $org, $state, $secretType, $resolution, $page, $perPage);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
