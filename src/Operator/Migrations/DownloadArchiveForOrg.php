<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Migrations;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DownloadArchiveForOrg
{
    public const OPERATION_ID    = 'migrations/download-archive-for-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/migrations/{migration_id}/archive';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/migrations/{migration_id}/archive';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Archive $hydrator)
    {
    }

    /** @return PromiseInterface<array> **/
    public function call(string $org, int $migrationId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Migrations\DownloadArchiveForOrg($this->responseSchemaValidator, $this->hydrator, $org, $migrationId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
