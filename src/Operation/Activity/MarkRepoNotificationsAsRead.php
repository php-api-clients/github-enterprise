<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Activity;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Schema;
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

final class MarkRepoNotificationsAsRead
{
    public const OPERATION_ID    = 'activity/mark-repo-notifications-as-read';
    public const OPERATION_MATCH = 'PUT /repos/{owner}/{repo}/notifications';
    private const METHOD         = 'PUT';
    private const PATH           = '/repos/{owner}/{repo}/notifications';
    private readonly SchemaValidator $requestSchemaValidator;
    /**The account owner of the repository. The name is not case sensitive. **/
    private string $owner;
    /**The name of the repository without the `.git` extension. The name is not case sensitive. **/
    private string $repo;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repos\Owner\Repo\Notifications $hydrator;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repos\Owner\Repo\Notifications $hydrator, string $owner, string $repo)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->owner                   = $owner;
        $this->repo                    = $repo;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator                = $hydrator;
    }

    public function createRequest(array $data): RequestInterface
    {
        $this->requestSchemaValidator->validate($data, Reader::readFromJson(Schema\Activity\MarkRepoNotificationsAsRead\Request\ApplicationJson::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

        return new Request(self::METHOD, str_replace(['{owner}', '{repo}'], [$this->owner, $this->repo], self::PATH), ['Content-Type' => 'application/json'], json_encode($data));
    }

    /**
     * @return Schema\Operations\Activity\MarkRepoNotificationsAsRead\Response\ApplicationJson\Accepted\Application\Json|array{code: int}
     */
    public function createResponse(ResponseInterface $response): Schema\Operations\Activity\MarkRepoNotificationsAsRead\Response\ApplicationJson\Accepted\Application\Json|array
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
                    case 202:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operations\Activity\MarkRepoNotificationsAsRead\Response\ApplicationJson\Accepted\Application\Json::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\Operations\Activity\MarkRepoNotificationsAsRead\Response\ApplicationJson\Accepted\Application\Json::class, $body);
                }

                break;
        }

        switch ($code) {
            /**
             * Reset Content
             **/
            case 205:
                return ['code' => 205];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
