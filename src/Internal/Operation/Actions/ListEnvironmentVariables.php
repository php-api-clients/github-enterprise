<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Operation\Actions;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function explode;
use function json_decode;
use function str_replace;

final class ListEnvironmentVariables
{
    public const OPERATION_ID    = 'actions/list-environment-variables';
    public const OPERATION_MATCH = 'GET /repositories/{repository_id}/environments/{environment_name}/variables';
    /**The unique identifier of the repository. **/
    private int $repositoryId;
    /**The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`. **/
    private string $environmentName;
    /**The number of results per page (max 30). For more information, see "[Using pagination in the REST API](https://docs.github.com/enterprise-server@3.8/rest/using-the-rest-api/using-pagination-in-the-rest-api)." **/
    private int $perPage;
    /**The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/enterprise-server@3.8/rest/using-the-rest-api/using-pagination-in-the-rest-api)." **/
    private int $page;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Internal\Hydrator\Operation\Repositories\RepositoryId\Environments\EnvironmentName\Variables $hydrator, int $repositoryId, string $environmentName, int $perPage = 10, int $page = 1)
    {
        $this->repositoryId    = $repositoryId;
        $this->environmentName = $environmentName;
        $this->perPage         = $perPage;
        $this->page            = $page;
    }

    public function createRequest(): RequestInterface
    {
        return new Request('GET', str_replace(['{repository_id}', '{environment_name}', '{per_page}', '{page}'], [$this->repositoryId, $this->environmentName, $this->perPage, $this->page], '/repositories/{repository_id}/environments/{environment_name}/variables' . '?per_page={per_page}&page={page}'));
    }

    public function createResponse(ResponseInterface $response): Schema\Operations\Actions\ListEnvironmentVariables\Response\ApplicationJson\Ok\Application\Json
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
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operations\Actions\ListEnvironmentVariables\Response\ApplicationJson\Ok\Application\Json::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\Operations\Actions\ListEnvironmentVariables\Response\ApplicationJson\Ok\Application\Json::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
