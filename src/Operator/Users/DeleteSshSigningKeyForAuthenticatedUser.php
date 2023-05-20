<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Users;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteSshSigningKeyForAuthenticatedUser
{
    public const OPERATION_ID    = 'users/delete-ssh-signing-key-for-authenticated-user';
    public const OPERATION_MATCH = 'DELETE /user/ssh_signing_keys/{ssh_signing_key_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/user/ssh_signing_keys/{ssh_signing_key_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\SshSigningKeys\SshSigningKeyId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(int $sshSigningKeyId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Users\DeleteSshSigningKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $sshSigningKeyId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
