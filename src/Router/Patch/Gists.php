<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Router\Patch;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class Gists
{
    /**
     * @var array<class-string, \EventSauce\ObjectHydrator\ObjectMapper>
     */
    private array $hydrator = array();
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly \ApiClients\Client\GitHubEnterprise\Hydrators $hydrators;
    private readonly \React\Http\Browser $browser;
    private readonly \ApiClients\Contracts\HTTP\Headers\AuthenticationInterface $authentication;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, \ApiClients\Client\GitHubEnterprise\Hydrators $hydrators, \React\Http\Browser $browser, \ApiClients\Contracts\HTTP\Headers\AuthenticationInterface $authentication)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrators = $hydrators;
        $this->browser = $browser;
        $this->authentication = $authentication;
    }
    public function update(array $params)
    {
        $arguments = array();
        if (array_key_exists('gist_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: gist_id');
        }
        $arguments['gist_id'] = $params['gist_id'];
        unset($params['gist_id']);
        if (\array_key_exists(Hydrator\Operation\Gists\CbGistIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Gists\CbGistIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Gists🌀CbGistIdRcb();
        }
        $operation = new Operation\Gists\Update($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Gists\CbGistIdRcb::class], $arguments['gist_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\GistSimple {
            return $operation->createResponse($response);
        });
    }
    public function updateComment(array $params)
    {
        $arguments = array();
        if (array_key_exists('gist_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: gist_id');
        }
        $arguments['gist_id'] = $params['gist_id'];
        unset($params['gist_id']);
        if (array_key_exists('comment_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: comment_id');
        }
        $arguments['comment_id'] = $params['comment_id'];
        unset($params['comment_id']);
        if (\array_key_exists(Hydrator\Operation\Gists\CbGistIdRcb\Comments\CbCommentIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Gists\CbGistIdRcb\Comments\CbCommentIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Gists🌀CbGistIdRcb🌀Comments🌀CbCommentIdRcb();
        }
        $operation = new Operation\Gists\UpdateComment($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Gists\CbGistIdRcb\Comments\CbCommentIdRcb::class], $arguments['gist_id'], $arguments['comment_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\GistComment {
            return $operation->createResponse($response);
        });
    }
}
