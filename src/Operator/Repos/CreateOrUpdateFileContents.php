<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Repos;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema\FileCommit;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class CreateOrUpdateFileContents
{
    public const OPERATION_ID    = 'repos/create-or-update-file-contents';
    public const OPERATION_MATCH = 'PUT /repos/{owner}/{repo}/contents/{path}';
    private const METHOD         = 'PUT';
    private const PATH           = '/repos/{owner}/{repo}/contents/{path}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Contents\Path $hydrator)
    {
    }

    /**
     * @return PromiseInterface<FileCommit>
     **/
    public function call(string $owner, string $repo, string $path, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Repos\CreateOrUpdateFileContents($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $path);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): FileCommit {
            return $operation->createResponse($response);
        });
    }
}
