<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Activity;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class DeleteThreadSubscription
{
    public const OPERATION_ID    = 'activity/delete-thread-subscription';
    public const OPERATION_MATCH = 'DELETE /notifications/threads/{thread_id}/subscription';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Notifications\Threads\ThreadId\Subscription $hydrator)
    {
    }

    /** @return array{code:int} */
    public function call(int $threadId): array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Activity\DeleteThreadSubscription($this->responseSchemaValidator, $this->hydrator, $threadId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
