<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation\Meta;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function explode;
use function str_replace;

final class GetZen
{
    public const OPERATION_ID    = 'meta/get-zen';
    public const OPERATION_MATCH = 'GET /zen';
    private const METHOD         = 'GET';
    private const PATH           = '/zen';

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Hydrator\Operation\Zen $hydrator)
    {
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace([], [], self::PATH));
    }

    public function createResponse(ResponseInterface $response): string
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'text/plain':
                $body = $response->getBody()->getContents();
                switch ($code) {
                    case 200:
                        return $body;
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
