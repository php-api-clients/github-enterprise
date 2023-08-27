<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Users;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\GpgKey;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetGpgKeyForAuthenticatedUser
{
    public const OPERATION_ID    = 'users/get-gpg-key-for-authenticated-user';
    public const OPERATION_MATCH = 'GET /user/gpg_keys/{gpg_key_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\GpgKeys\GpgKeyId $hydrator)
    {
    }

    /** @return Schema\GpgKey|array{code:int} */
    public function call(int $gpgKeyId): GpgKey|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Users\GetGpgKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $gpgKeyId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): GpgKey|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
