<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operator\Issues;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\IssueComment;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class CreateComment
{
    public const OPERATION_ID    = 'issues/create-comment';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/issues/{issue_number}/comments';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\Issues\IssueNumber\Comments $hydrator)
    {
    }

    /** @return Schema\IssueComment */
    public function call(string $owner, string $repo, int $issueNumber, array $params): IssueComment|array
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Internal\Operation\Issues\CreateComment($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $issueNumber);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): IssueComment|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
