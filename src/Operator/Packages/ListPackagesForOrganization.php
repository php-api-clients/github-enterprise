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

final readonly class ListPackagesForOrganization
{
    public const OPERATION_ID    = 'packages/list-packages-for-organization';
    public const OPERATION_MATCH = 'GET /orgs/{org}/packages';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/packages';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Packages $hydrator)
    {
    }

    /** @return (iterable<Schema\Package> | array{code: int}) */
    public function call(string $packageType, string $org, string $visibility, int $page = 1, int $perPage = 30): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Packages\ListPackagesForOrganization($this->responseSchemaValidator, $this->hydrator, $packageType, $org, $visibility, $page, $perPage);
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
