<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Users;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeletePublicSshKeyForAuthenticatedUser
{
    public const OPERATION_ID    = 'users/delete-public-ssh-key-for-authenticated-user';
    public const OPERATION_MATCH = 'DELETE /user/keys/{key_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/user/keys/{key_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\Keys\KeyId $hydrator)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(int $keyId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Users\DeletePublicSshKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $keyId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
