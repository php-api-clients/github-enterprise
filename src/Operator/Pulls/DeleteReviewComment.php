<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Pulls;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteReviewComment
{
    public const OPERATION_ID    = 'pulls/delete-review-comment';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/pulls/comments/{comment_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/pulls/comments/{comment_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Pulls\Comments\CommentId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(string $owner, string $repo, int $commentId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Pulls\DeleteReviewComment($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $commentId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
