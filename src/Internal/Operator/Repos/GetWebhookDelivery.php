<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema\HookDelivery;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetWebhookDelivery
{
    public const OPERATION_ID    = 'repos/get-webhook-delivery';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/hooks/{hook_id}/deliveries/{delivery_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\Hooks\HookId\Deliveries\DeliveryId $hydrator)
    {
    }

    public function call(string $owner, string $repo, int $hookId, int $deliveryId): HookDelivery
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Repos\GetWebhookDelivery($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $hookId, $deliveryId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): HookDelivery {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
