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
final class Orgs
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
    public function updateWebhookConfigForOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('hook_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: hook_id');
        }
        $arguments['hook_id'] = $params['hook_id'];
        unset($params['hook_id']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Hooks\CbHookIdRcb\Config::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Hooks\CbHookIdRcb\Config::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Hooks🌀CbHookIdRcb🌀Config();
        }
        $operation = new Operation\Orgs\UpdateWebhookConfigForOrg($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Hooks\CbHookIdRcb\Config::class], $arguments['org'], $arguments['hook_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\WebhookConfig {
            return $operation->createResponse($response);
        });
    }
    public function update(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb();
        }
        $operation = new Operation\Orgs\Update($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb::class], $arguments['org']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\OrganizationFull {
            return $operation->createResponse($response);
        });
    }
    public function updateWebhook(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('hook_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: hook_id');
        }
        $arguments['hook_id'] = $params['hook_id'];
        unset($params['hook_id']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Hooks\CbHookIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Hooks\CbHookIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Hooks🌀CbHookIdRcb();
        }
        $operation = new Operation\Orgs\UpdateWebhook($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Hooks\CbHookIdRcb::class], $arguments['org'], $arguments['hook_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\OrgHook {
            return $operation->createResponse($response);
        });
    }
    public function updateMembershipForAuthenticatedUser(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (\array_key_exists(Hydrator\Operation\User\Memberships\Orgs\CbOrgRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\User\Memberships\Orgs\CbOrgRcb::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Memberships🌀Orgs🌀CbOrgRcb();
        }
        $operation = new Operation\Orgs\UpdateMembershipForAuthenticatedUser($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Memberships\Orgs\CbOrgRcb::class], $arguments['org']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\OrgMembership {
            return $operation->createResponse($response);
        });
    }
}
