<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Packages;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class ListDockerMigrationConflictingPackagesForUser
{
    public const OPERATION_ID    = 'packages/list-docker-migration-conflicting-packages-for-user';
    public const OPERATION_MATCH = 'GET /users/{username}/docker/conflicts';
    private const METHOD         = 'GET';
    private const PATH           = '/users/{username}/docker/conflicts';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Users\Username\Docker\Conflicts $hydrator)
    {
    }

    /** @return iterable<Schema\Package> */
    public function call(string $username): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Packages\ListDockerMigrationConflictingPackagesForUser($this->responseSchemaValidator, $this->hydrator, $username);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
