<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Operation\Repos;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class ListForAuthenticatedUser
{
    public const OPERATION_ID = 'repos/list-for-authenticated-user';
    public const OPERATION_MATCH = 'GET /user/repos';
    private const METHOD = 'GET';
    private const PATH = '/user/repos';
    /**The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.**/
    private string $direction;
    /**Only show notifications updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.**/
    private string $since;
    /**Only show notifications updated before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.**/
    private string $before;
    /**Limit results to repositories with the specified visibility.**/
    private string $visibility;
    /**Comma-separated list of values. Can include:  
    \* `owner`: Repositories that are owned by the authenticated user.  
    \* `collaborator`: Repositories that the user has been added to as a collaborator.  
    \* `organization_member`: Repositories that the user has access to through being a member of an organization. This includes every repository on every team that the user is on.**/
    private string $affiliation;
    /**Limit results to repositories of the specified type. Will cause a `422` error if used in the same request as **visibility** or **affiliation**.**/
    private string $type;
    /**The property to sort the results by.**/
    private string $sort;
    /**The number of results per page (max 100).**/
    private int $perPage;
    /**Page number of the results to fetch.**/
    private int $page;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\User\Repos $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\User\Repos $hydrator, string $direction, string $since, string $before, string $visibility = 'all', string $affiliation = 'owner,collaborator,organization_member', string $type = 'all', string $sort = 'full_name', int $perPage = 30, int $page = 1)
    {
        $this->direction = $direction;
        $this->since = $since;
        $this->before = $before;
        $this->visibility = $visibility;
        $this->affiliation = $affiliation;
        $this->type = $type;
        $this->sort = $sort;
        $this->perPage = $perPage;
        $this->page = $page;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{direction}', '{since}', '{before}', '{visibility}', '{affiliation}', '{type}', '{sort}', '{per_page}', '{page}'), array($this->direction, $this->since, $this->before, $this->visibility, $this->affiliation, $this->type, $this->sort, $this->perPage, $this->page), self::PATH . '?direction={direction}&since={since}&before={before}&visibility={visibility}&affiliation={affiliation}&type={type}&sort={sort}&per_page={per_page}&page={page}'));
    }
    /**
     * @return \Rx\Observable<Schema\Repository>
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Rx\Observable
    {
        $code = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response
                    **/
                    case 200:
                        foreach ($body as $bodyItem) {
                            $this->responseSchemaValidator->validate($bodyItem, \cebe\openapi\Reader::readFromJson(Schema\Repository::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        }
                        return \Rx\Observable::fromArray($body, new \Rx\Scheduler\ImmediateScheduler())->map(function (array $body) : Schema\Repository {
                            return $this->hydrator->hydrateObject(Schema\Repository::class, $body);
                        });
                    /**
                     * Validation failed
                    **/
                    case 422:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\ValidationError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        throw new ErrorSchemas\ValidationError(422, $this->hydrator->hydrateObject(Schema\ValidationError::class, $body));
                    /**
                     * Forbidden
                    **/
                    case 403:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        throw new ErrorSchemas\BasicError(403, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                    /**
                     * Requires authentication
                    **/
                    case 401:
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        throw new ErrorSchemas\BasicError(401, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
