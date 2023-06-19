<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeclineInvitationForAuthenticatedUser
{
    public const OPERATION_ID    = 'repos/decline-invitation-for-authenticated-user';
    public const OPERATION_MATCH = 'DELETE /user/repository_invitations/{invitation_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/user/repository_invitations/{invitation_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\RepositoryInvitations\InvitationId $hydrator)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(int $invitationId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\DeclineInvitationForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $invitationId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
