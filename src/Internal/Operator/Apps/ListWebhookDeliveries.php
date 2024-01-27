<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Apps;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListWebhookDeliveries
{
    public const OPERATION_ID    = 'apps/list-webhook-deliveries';
    public const OPERATION_MATCH = 'GET /app/hook/deliveries';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\App\Hook\Deliveries $hydrator)
    {
    }

    /** @return Observable<Schema\HookDeliveryItem> */
    public function call(string $cursor, bool $redelivery, int $perPage = 30): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Apps\ListWebhookDeliveries($this->responseSchemaValidator, $this->hydrator, $cursor, $redelivery, $perPage);
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
