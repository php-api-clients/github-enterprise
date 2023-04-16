<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Router\Delete;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class Users
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
    public function unfollow(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (\array_key_exists(Hydrator\Operation\User\Following\CbUsernameRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Following\CbUsernameRcb::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Following🌀CbUsernameRcb();
        }
        $operation = new Operation\Users\Unfollow($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Following\CbUsernameRcb::class], $arguments['username']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : mixed {
            return $operation->createResponse($response);
        });
    }
    public function deleteGpgKeyForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('gpg_key_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: gpg_key_id');
        }
        $arguments['gpg_key_id'] = $params['gpg_key_id'];
        unset($params['gpg_key_id']);
        if (\array_key_exists(Hydrator\Operation\User\GpgKeys\CbGpgKeyIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\GpgKeys\CbGpgKeyIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀User🌀GpgKeys🌀CbGpgKeyIdRcb();
        }
        $operation = new Operation\Users\DeleteGpgKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\GpgKeys\CbGpgKeyIdRcb::class], $arguments['gpg_key_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : mixed {
            return $operation->createResponse($response);
        });
    }
    public function deletePublicSshKeyForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('key_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: key_id');
        }
        $arguments['key_id'] = $params['key_id'];
        unset($params['key_id']);
        if (\array_key_exists(Hydrator\Operation\User\Keys\CbKeyIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Keys\CbKeyIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Keys🌀CbKeyIdRcb();
        }
        $operation = new Operation\Users\DeletePublicSshKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Keys\CbKeyIdRcb::class], $arguments['key_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : mixed {
            return $operation->createResponse($response);
        });
    }
    public function deleteEmailForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\User\Emails::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Emails::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Emails();
        }
        $operation = new Operation\Users\DeleteEmailForAuthenticatedUser($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Emails::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : mixed {
            return $operation->createResponse($response);
        });
    }
}
