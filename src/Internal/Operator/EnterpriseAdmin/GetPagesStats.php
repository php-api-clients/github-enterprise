<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\EnterprisePageOverview;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetPagesStats
{
    public const OPERATION_ID    = 'enterprise-admin/get-pages-stats';
    public const OPERATION_MATCH = 'GET /enterprise/stats/pages';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Enterprise\Stats\Pages $hydrator)
    {
    }

    /** @return Schema\EnterprisePageOverview */
    public function call(): EnterprisePageOverview|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\EnterpriseAdmin\GetPagesStats($this->responseSchemaValidator, $this->hydrator);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): EnterprisePageOverview|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
