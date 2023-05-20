<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operator\Projects;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteCard
{
    public const OPERATION_ID    = 'projects/delete-card';
    public const OPERATION_MATCH = 'DELETE /projects/columns/cards/{card_id}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/projects/columns/cards/{card_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Projects\Columns\Cards\CardId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(int $cardId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterprise\Operation\Projects\DeleteCard($this->responseSchemaValidator, $this->hydrator, $cardId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}
