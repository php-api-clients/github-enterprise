<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Router\Get;

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
    public function listEmailsForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\User\Emails::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Emails::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Emails();
        }
        $operation = new Operation\Users\ListEmailsForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Emails::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listFollowersForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\User\Followers::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Followers::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Followers();
        }
        $operation = new Operation\Users\ListFollowersForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Followers::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listFollowedByAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\User\Following::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Following::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Following();
        }
        $operation = new Operation\Users\ListFollowedByAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Following::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listGpgKeysForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\User\GpgKeys::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\GpgKeys::class] = $this->hydrators->getObjectMapperOperation🌀User🌀GpgKeys();
        }
        $operation = new Operation\Users\ListGpgKeysForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\GpgKeys::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listPublicSshKeysForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\User\Keys::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Keys::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Keys();
        }
        $operation = new Operation\Users\ListPublicSshKeysForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Keys::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listPublicEmailsForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\User\PublicEmails::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\PublicEmails::class] = $this->hydrators->getObjectMapperOperation🌀User🌀PublicEmails();
        }
        $operation = new Operation\Users\ListPublicEmailsForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\PublicEmails::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getByUsername(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (\array_key_exists(Hydrator\Operation\Users\CbUsernameRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb::class] = $this->hydrators->getObjectMapperOperation🌀Users🌀CbUsernameRcb();
        }
        $operation = new Operation\Users\GetByUsername($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb::class], $arguments['username']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Users\GetByUsername\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function checkPersonIsFollowedByAuthenticated(array $params)
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
        $operation = new Operation\Users\CheckPersonIsFollowedByAuthenticated($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Following\CbUsernameRcb::class], $arguments['username']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : mixed {
            return $operation->createResponse($response);
        });
    }
    public function getGpgKeyForAuthenticatedUser(array $params)
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
        $operation = new Operation\Users\GetGpgKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\GpgKeys\CbGpgKeyIdRcb::class], $arguments['gpg_key_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\GpgKey {
            return $operation->createResponse($response);
        });
    }
    public function getPublicSshKeyForAuthenticatedUser(array $params)
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
        $operation = new Operation\Users\GetPublicSshKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Keys\CbKeyIdRcb::class], $arguments['key_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Key {
            return $operation->createResponse($response);
        });
    }
    public function listFollowersForUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\Users\CbUsernameRcb\Followers::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Followers::class] = $this->hydrators->getObjectMapperOperation🌀Users🌀CbUsernameRcb🌀Followers();
        }
        $operation = new Operation\Users\ListFollowersForUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Followers::class], $arguments['username'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listFollowingForUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\Users\CbUsernameRcb\Following::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Following::class] = $this->hydrators->getObjectMapperOperation🌀Users🌀CbUsernameRcb🌀Following();
        }
        $operation = new Operation\Users\ListFollowingForUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Following::class], $arguments['username'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listGpgKeysForUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\Users\CbUsernameRcb\GpgKeys::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\GpgKeys::class] = $this->hydrators->getObjectMapperOperation🌀Users🌀CbUsernameRcb🌀GpgKeys();
        }
        $operation = new Operation\Users\ListGpgKeysForUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\GpgKeys::class], $arguments['username'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getContextForUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists('subject_type', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: subject_type');
        }
        $arguments['subject_type'] = $params['subject_type'];
        unset($params['subject_type']);
        if (array_key_exists('subject_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: subject_id');
        }
        $arguments['subject_id'] = $params['subject_id'];
        unset($params['subject_id']);
        if (\array_key_exists(Hydrator\Operation\Users\CbUsernameRcb\Hovercard::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Hovercard::class] = $this->hydrators->getObjectMapperOperation🌀Users🌀CbUsernameRcb🌀Hovercard();
        }
        $operation = new Operation\Users\GetContextForUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Hovercard::class], $arguments['username'], $arguments['subject_type'], $arguments['subject_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Hovercard {
            return $operation->createResponse($response);
        });
    }
    public function listPublicKeysForUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (\array_key_exists(Hydrator\Operation\Users\CbUsernameRcb\Keys::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Keys::class] = $this->hydrators->getObjectMapperOperation🌀Users🌀CbUsernameRcb🌀Keys();
        }
        $operation = new Operation\Users\ListPublicKeysForUser($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Users\CbUsernameRcb\Keys::class], $arguments['username'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getAuthenticated(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\User::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User::class] = $this->hydrators->getObjectMapperOperation🌀User();
        }
        $operation = new Operation\Users\GetAuthenticated($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Users\GetAuthenticated\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function list_(array $params)
    {
        $arguments = array();
        if (array_key_exists('since', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: since');
        }
        $arguments['since'] = $params['since'];
        unset($params['since']);
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (\array_key_exists(Hydrator\Operation\Users::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Users::class] = $this->hydrators->getObjectMapperOperation🌀Users();
        }
        $operation = new Operation\Users\List_($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Users::class], $arguments['since'], $arguments['per_page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function checkFollowingForUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('username', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: username');
        }
        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists('target_user', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: target_user');
        }
        $arguments['target_user'] = $params['target_user'];
        unset($params['target_user']);
        $operation = new Operation\Users\CheckFollowingForUser($arguments['username'], $arguments['target_user']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Psr\Http\Message\ResponseInterface {
            return $operation->createResponse($response);
        });
    }
}
