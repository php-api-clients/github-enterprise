<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Actions;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\OrganizationActionsVariable;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetOrgVariable
{
    public const OPERATION_ID    = 'actions/get-org-variable';
    public const OPERATION_MATCH = 'GET /orgs/{org}/actions/variables/{name}';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/actions/variables/{name}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Actions\Variables\Name $hydrator)
    {
    }

    /** @return */
    public function call(string $org, string $name): OrganizationActionsVariable|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Actions\GetOrgVariable($this->responseSchemaValidator, $this->hydrator, $org, $name);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): OrganizationActionsVariable|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
