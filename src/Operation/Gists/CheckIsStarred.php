<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Gists;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
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
use function str_replace;

final class CheckIsStarred
{
    public const OPERATION_ID    = 'gists/check-is-starred';
    public const OPERATION_MATCH = 'GET /gists/{gist_id}/star';
    private const METHOD         = 'GET';
    private const PATH           = '/gists/{gist_id}/star';
    /**The unique identifier of the gist. **/
    private string $gistId;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Hydrator\Operation\Gists\GistId\Star $hydrator, string $gistId)
    {
        $this->gistId = $gistId;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{gist_id}'], [$this->gistId], self::PATH));
    }

    /** @return array{code: int} */
    public function createResponse(ResponseInterface $response): array
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Not Found if gist is not starred
                     **/
                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operations\Gists\CheckIsStarred\Response\ApplicationJson\NotFound::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\Operations\Gists\CheckIsStarred\Response\ApplicationJson\NotFound(404, $this->hydrator->hydrateObject(Schema\Operations\Gists\CheckIsStarred\Response\ApplicationJson\NotFound::class, $body));
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
             * Response if gist is starred
             **/
            case 204:
                return ['code' => 204];
            /**
             * Not modified
             **/

            case 304:
                return ['code' => 304];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
