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

final readonly class AddStatusCheckContexts
{
    public const OPERATION_ID    = 'repos/add-status-check-contexts';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/branches/{branch}/protection/required_status_checks/contexts';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\Branches\Branch\Protection\RequiredStatusChecks\Contexts $hydrator)
    {
    }

    /** @return iterable<string> */
    public function call(string $owner, string $repo, string $branch, array $params): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Repos\AddStatusCheckContexts($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $branch);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
