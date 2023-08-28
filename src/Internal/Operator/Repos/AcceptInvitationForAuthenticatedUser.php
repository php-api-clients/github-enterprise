<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class AcceptInvitationForAuthenticatedUser
{
    public const OPERATION_ID    = 'repos/accept-invitation-for-authenticated-user';
    public const OPERATION_MATCH = 'PATCH /user/repository_invitations/{invitation_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\User\RepositoryInvitations\InvitationId $hydrator)
    {
    }

    /** @return array{code:int} */
    public function call(int $invitationId): array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Repos\AcceptInvitationForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $invitationId);
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
