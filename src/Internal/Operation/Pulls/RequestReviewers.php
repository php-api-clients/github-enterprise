<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operation\Pulls;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function explode;
use function json_decode;
use function json_encode;
use function str_replace;

final class RequestReviewers
{
    public const OPERATION_ID    = 'pulls/request-reviewers';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/pulls/{pull_number}/requested_reviewers';
    /**The account owner of the repository. The name is not case sensitive. **/
    private string $owner;
    /**The name of the repository. The name is not case sensitive. **/
    private string $repo;
    /**The number that identifies the pull request. **/
    private int $pullNumber;

    public function __construct(private readonly SchemaValidator $requestSchemaValidator, private readonly SchemaValidator $responseSchemaValidator, private readonly Internal\Hydrator\Operation\Repos\Owner\Repo\Pulls\PullNumber\RequestedReviewers $hydrator, string $owner, string $repo, int $pullNumber)
    {
        $this->owner      = $owner;
        $this->repo       = $repo;
        $this->pullNumber = $pullNumber;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Pulls\RequestReviewers\Request\ApplicationJson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request('POST', str_replace(['{owner}', '{repo}', '{pull_number}'], [$this->owner, $this->repo, $this->pullNumber], '/repos/{owner}/{repo}/pulls/{pull_number}/requested_reviewers'), ['Content-Type' => 'application/json'], json_encode($data));
    }

    public function createResponse(ResponseInterface $response): Schema\PullRequestSimple|WithoutBody
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response
                     **/
                    case 201:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\PullRequestSimple::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\PullRequestSimple::class, $body);
                    /**
                     * Forbidden
                     **/

                    case 403:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(403, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

        switch ($code) {
            /**
             * Unprocessable Entity if user is not a collaborator
             **/
            case 422:
                return new WithoutBody(422, []);
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
