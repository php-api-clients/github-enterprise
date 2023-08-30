<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Issues;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\BasicError;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class AddLabels
{
    public const OPERATION_ID    = 'issues/add-labels';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/issues/{issue_number}/labels';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\Issues\IssueNumber\Labels $hydrator)
    {
    }

    /** @return Observable<Schema\Label>|Schema\BasicError */
    public function call(string $owner, string $repo, int $issueNumber, array $params): iterable|BasicError
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Issues\AddLabels($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $issueNumber);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable|BasicError|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
