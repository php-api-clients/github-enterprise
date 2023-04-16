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
final class EnterpriseAdmin
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
    public function listGlobalWebhooks(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Admin\Hooks::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\Hooks::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀Hooks();
        }
        $operation = new Operation\EnterpriseAdmin\ListGlobalWebhooks($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\Hooks::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listPublicKeys(array $params)
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
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('direction', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: direction');
        }
        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: sort');
        }
        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        if (\array_key_exists(Hydrator\Operation\Admin\Keys::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\Keys::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀Keys();
        }
        $operation = new Operation\EnterpriseAdmin\ListPublicKeys($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\Keys::class], $arguments['since'], $arguments['per_page'], $arguments['page'], $arguments['direction'], $arguments['sort']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listPreReceiveEnvironments(array $params)
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
        if (array_key_exists('direction', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: direction');
        }
        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: sort');
        }
        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        if (\array_key_exists(Hydrator\Operation\Admin\PreReceiveEnvironments::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\PreReceiveEnvironments::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀PreReceiveEnvironments();
        }
        $operation = new Operation\EnterpriseAdmin\ListPreReceiveEnvironments($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\PreReceiveEnvironments::class], $arguments['per_page'], $arguments['page'], $arguments['direction'], $arguments['sort']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listPreReceiveHooks(array $params)
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
        if (array_key_exists('direction', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: direction');
        }
        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: sort');
        }
        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        if (\array_key_exists(Hydrator\Operation\Admin\PreReceiveHooks::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\PreReceiveHooks::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀PreReceiveHooks();
        }
        $operation = new Operation\EnterpriseAdmin\ListPreReceiveHooks($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\PreReceiveHooks::class], $arguments['per_page'], $arguments['page'], $arguments['direction'], $arguments['sort']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listPersonalAccessTokens(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Admin\Tokens::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\Tokens::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀Tokens();
        }
        $operation = new Operation\EnterpriseAdmin\ListPersonalAccessTokens($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\Tokens::class], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getAnnouncement(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Announcement::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Announcement::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Announcement();
        }
        $operation = new Operation\EnterpriseAdmin\GetAnnouncement($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Announcement::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Announcement {
            return $operation->createResponse($response);
        });
    }
    public function getGlobalWebhook(array $params)
    {
        $arguments = array();
        if (array_key_exists('hook_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: hook_id');
        }
        $arguments['hook_id'] = $params['hook_id'];
        unset($params['hook_id']);
        if (array_key_exists('accept', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: accept');
        }
        $arguments['accept'] = $params['accept'];
        unset($params['accept']);
        if (\array_key_exists(Hydrator\Operation\Admin\Hooks\CbHookIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\Hooks\CbHookIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀Hooks🌀CbHookIdRcb();
        }
        $operation = new Operation\EnterpriseAdmin\GetGlobalWebhook($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\Hooks\CbHookIdRcb::class], $arguments['hook_id'], $arguments['accept']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\GlobalHook {
            return $operation->createResponse($response);
        });
    }
    public function getPreReceiveEnvironment(array $params)
    {
        $arguments = array();
        if (array_key_exists('pre_receive_environment_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: pre_receive_environment_id');
        }
        $arguments['pre_receive_environment_id'] = $params['pre_receive_environment_id'];
        unset($params['pre_receive_environment_id']);
        if (\array_key_exists(Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀PreDashReceiveDashEnvironments🌀CbPreReceiveEnvironmentIdRcb();
        }
        $operation = new Operation\EnterpriseAdmin\GetPreReceiveEnvironment($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb::class], $arguments['pre_receive_environment_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\PreReceiveEnvironment {
            return $operation->createResponse($response);
        });
    }
    public function getPreReceiveHook(array $params)
    {
        $arguments = array();
        if (array_key_exists('pre_receive_hook_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: pre_receive_hook_id');
        }
        $arguments['pre_receive_hook_id'] = $params['pre_receive_hook_id'];
        unset($params['pre_receive_hook_id']);
        if (\array_key_exists(Hydrator\Operation\Admin\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀PreDashReceiveDashHooks🌀CbPreReceiveHookIdRcb();
        }
        $operation = new Operation\EnterpriseAdmin\GetPreReceiveHook($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class], $arguments['pre_receive_hook_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\PreReceiveHook {
            return $operation->createResponse($response);
        });
    }
    public function getLicenseInformation(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Settings\License::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Settings\License::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Settings🌀License();
        }
        $operation = new Operation\EnterpriseAdmin\GetLicenseInformation($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Settings\License::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\LicenseInfo {
            return $operation->createResponse($response);
        });
    }
    public function getAllStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\All::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\All::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀All();
        }
        $operation = new Operation\EnterpriseAdmin\GetAllStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\All::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseOverview {
            return $operation->createResponse($response);
        });
    }
    public function getCommentStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Comments::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Comments::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Comments();
        }
        $operation = new Operation\EnterpriseAdmin\GetCommentStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Comments::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseCommentOverview {
            return $operation->createResponse($response);
        });
    }
    public function getGistStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Gists::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Gists::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Gists();
        }
        $operation = new Operation\EnterpriseAdmin\GetGistStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Gists::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseGistOverview {
            return $operation->createResponse($response);
        });
    }
    public function getHooksStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Hooks::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Hooks::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Hooks();
        }
        $operation = new Operation\EnterpriseAdmin\GetHooksStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Hooks::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseHookOverview {
            return $operation->createResponse($response);
        });
    }
    public function getIssueStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Issues::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Issues::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Issues();
        }
        $operation = new Operation\EnterpriseAdmin\GetIssueStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Issues::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseIssueOverview {
            return $operation->createResponse($response);
        });
    }
    public function getMilestoneStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Milestones::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Milestones::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Milestones();
        }
        $operation = new Operation\EnterpriseAdmin\GetMilestoneStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Milestones::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseMilestoneOverview {
            return $operation->createResponse($response);
        });
    }
    public function getOrgStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Orgs::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Orgs::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Orgs();
        }
        $operation = new Operation\EnterpriseAdmin\GetOrgStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Orgs::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseOrganizationOverview {
            return $operation->createResponse($response);
        });
    }
    public function getPagesStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Pages::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Pages::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Pages();
        }
        $operation = new Operation\EnterpriseAdmin\GetPagesStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Pages::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterprisePageOverview {
            return $operation->createResponse($response);
        });
    }
    public function getPullRequestStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Pulls::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Pulls::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Pulls();
        }
        $operation = new Operation\EnterpriseAdmin\GetPullRequestStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Pulls::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterprisePullRequestOverview {
            return $operation->createResponse($response);
        });
    }
    public function getRepoStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Repos::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Repos::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Repos();
        }
        $operation = new Operation\EnterpriseAdmin\GetRepoStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Repos::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseRepositoryOverview {
            return $operation->createResponse($response);
        });
    }
    public function getUserStats(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Enterprise\Stats\Users::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprise\Stats\Users::class] = $this->hydrators->getObjectMapperOperation🌀Enterprise🌀Stats🌀Users();
        }
        $operation = new Operation\EnterpriseAdmin\GetUserStats($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprise\Stats\Users::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseUserOverview {
            return $operation->createResponse($response);
        });
    }
    public function listPreReceiveHooksForOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
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
        if (array_key_exists('direction', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: direction');
        }
        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: sort');
        }
        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\PreReceiveHooks::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\PreReceiveHooks::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀PreReceiveHooks();
        }
        $operation = new Operation\EnterpriseAdmin\ListPreReceiveHooksForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\PreReceiveHooks::class], $arguments['org'], $arguments['per_page'], $arguments['page'], $arguments['direction'], $arguments['sort']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getConfigurationStatus(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Setup\Api\Configcheck::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Setup\Api\Configcheck::class] = $this->hydrators->getObjectMapperOperation🌀Setup🌀Api🌀Configcheck();
        }
        $operation = new Operation\EnterpriseAdmin\GetConfigurationStatus($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Setup\Api\Configcheck::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ConfigurationStatus {
            return $operation->createResponse($response);
        });
    }
    public function getMaintenanceStatus(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Setup\Api\Maintenance::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Setup\Api\Maintenance::class] = $this->hydrators->getObjectMapperOperation🌀Setup🌀Api🌀Maintenance();
        }
        $operation = new Operation\EnterpriseAdmin\GetMaintenanceStatus($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Setup\Api\Maintenance::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\MaintenanceStatus {
            return $operation->createResponse($response);
        });
    }
    public function getSettings(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Setup\Api\Settings::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Setup\Api\Settings::class] = $this->hydrators->getObjectMapperOperation🌀Setup🌀Api🌀Settings();
        }
        $operation = new Operation\EnterpriseAdmin\GetSettings($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Setup\Api\Settings::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\EnterpriseSettings {
            return $operation->createResponse($response);
        });
    }
    public function getDownloadStatusForPreReceiveEnvironment(array $params)
    {
        $arguments = array();
        if (array_key_exists('pre_receive_environment_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: pre_receive_environment_id');
        }
        $arguments['pre_receive_environment_id'] = $params['pre_receive_environment_id'];
        unset($params['pre_receive_environment_id']);
        if (\array_key_exists(Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads\Latest::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads\Latest::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀PreDashReceiveDashEnvironments🌀CbPreReceiveEnvironmentIdRcb🌀Downloads🌀Latest();
        }
        $operation = new Operation\EnterpriseAdmin\GetDownloadStatusForPreReceiveEnvironment($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads\Latest::class], $arguments['pre_receive_environment_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\PreReceiveEnvironmentDownloadStatus {
            return $operation->createResponse($response);
        });
    }
    public function listSelectedOrganizationsEnabledGithubActionsEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
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
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions\Organizations::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions\Organizations::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀Permissions🌀Organizations();
        }
        $operation = new Operation\EnterpriseAdmin\ListSelectedOrganizationsEnabledGithubActionsEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions\Organizations::class], $arguments['enterprise'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\EnterpriseAdmin\ListSelectedOrganizationsEnabledGithubActionsEnterprise\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function getAllowedActionsEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions\SelectedActions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions\SelectedActions::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀Permissions🌀SelectedActions();
        }
        $operation = new Operation\EnterpriseAdmin\GetAllowedActionsEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions\SelectedActions::class], $arguments['enterprise']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\SelectedActions {
            return $operation->createResponse($response);
        });
    }
    public function getSelfHostedRunnerGroupForEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_group_id');
        }
        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀RunnerDashGroups🌀CbRunnerGroupIdRcb();
        }
        $operation = new Operation\EnterpriseAdmin\GetSelfHostedRunnerGroupForEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb::class], $arguments['enterprise'], $arguments['runner_group_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\RunnerGroupsEnterprise {
            return $operation->createResponse($response);
        });
    }
    public function listRunnerApplicationsForEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners\Downloads::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners\Downloads::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀Runners🌀Downloads();
        }
        $operation = new Operation\EnterpriseAdmin\ListRunnerApplicationsForEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners\Downloads::class], $arguments['enterprise']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getSelfHostedRunnerForEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_id');
        }
        $arguments['runner_id'] = $params['runner_id'];
        unset($params['runner_id']);
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners\CbRunnerIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners\CbRunnerIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀Runners🌀CbRunnerIdRcb();
        }
        $operation = new Operation\EnterpriseAdmin\GetSelfHostedRunnerForEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners\CbRunnerIdRcb::class], $arguments['enterprise'], $arguments['runner_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Runner {
            return $operation->createResponse($response);
        });
    }
    public function getPreReceiveHookForRepo(array $params)
    {
        $arguments = array();
        if (array_key_exists('owner', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: owner');
        }
        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repo');
        }
        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('pre_receive_hook_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: pre_receive_hook_id');
        }
        $arguments['pre_receive_hook_id'] = $params['pre_receive_hook_id'];
        unset($params['pre_receive_hook_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀PreDashReceiveDashHooks🌀CbPreReceiveHookIdRcb();
        }
        $operation = new Operation\EnterpriseAdmin\GetPreReceiveHookForRepo($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class], $arguments['owner'], $arguments['repo'], $arguments['pre_receive_hook_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\RepositoryPreReceiveHook {
            return $operation->createResponse($response);
        });
    }
    public function getGithubActionsPermissionsEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀Permissions();
        }
        $operation = new Operation\EnterpriseAdmin\GetGithubActionsPermissionsEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Permissions::class], $arguments['enterprise']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsEnterprisePermissions {
            return $operation->createResponse($response);
        });
    }
    public function listSelfHostedRunnerGroupsForEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
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
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerGroups::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerGroups::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀RunnerGroups();
        }
        $operation = new Operation\EnterpriseAdmin\ListSelfHostedRunnerGroupsForEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerGroups::class], $arguments['enterprise'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\EnterpriseAdmin\ListSelfHostedRunnerGroupsForEnterprise\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listSelfHostedRunnersForEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
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
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀Runners();
        }
        $operation = new Operation\EnterpriseAdmin\ListSelfHostedRunnersForEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\Runners::class], $arguments['enterprise'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\EnterpriseAdmin\ListSelfHostedRunnersForEnterprise\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function getPreReceiveHookForOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('pre_receive_hook_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: pre_receive_hook_id');
        }
        $arguments['pre_receive_hook_id'] = $params['pre_receive_hook_id'];
        unset($params['pre_receive_hook_id']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀PreDashReceiveDashHooks🌀CbPreReceiveHookIdRcb();
        }
        $operation = new Operation\EnterpriseAdmin\GetPreReceiveHookForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\PreDashReceiveDashHooks\CbPreReceiveHookIdRcb::class], $arguments['org'], $arguments['pre_receive_hook_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\OrgPreReceiveHook {
            return $operation->createResponse($response);
        });
    }
    public function listPreReceiveHooksForRepo(array $params)
    {
        $arguments = array();
        if (array_key_exists('owner', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: owner');
        }
        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repo');
        }
        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
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
        if (array_key_exists('direction', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: direction');
        }
        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: sort');
        }
        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreReceiveHooks::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreReceiveHooks::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀PreReceiveHooks();
        }
        $operation = new Operation\EnterpriseAdmin\ListPreReceiveHooksForRepo($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\PreReceiveHooks::class], $arguments['owner'], $arguments['repo'], $arguments['per_page'], $arguments['page'], $arguments['direction'], $arguments['sort']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getAllAuthorizedSshKeys(array $params)
    {
        $arguments = array();
        if (\array_key_exists(Hydrator\Operation\Setup\Api\Settings\AuthorizedKeys::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Setup\Api\Settings\AuthorizedKeys::class] = $this->hydrators->getObjectMapperOperation🌀Setup🌀Api🌀Settings🌀AuthorizedKeys();
        }
        $operation = new Operation\EnterpriseAdmin\GetAllAuthorizedSshKeys($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Setup\Api\Settings\AuthorizedKeys::class]);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listOrgAccessToSelfHostedRunnerGroupInEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_group_id');
        }
        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
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
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Organizations::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Organizations::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀RunnerDashGroups🌀CbRunnerGroupIdRcb🌀Organizations();
        }
        $operation = new Operation\EnterpriseAdmin\ListOrgAccessToSelfHostedRunnerGroupInEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Organizations::class], $arguments['enterprise'], $arguments['runner_group_id'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\EnterpriseAdmin\ListOrgAccessToSelfHostedRunnerGroupInEnterprise\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listSelfHostedRunnersInGroupForEnterprise(array $params)
    {
        $arguments = array();
        if (array_key_exists('enterprise', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: enterprise');
        }
        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_group_id');
        }
        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
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
        if (\array_key_exists(Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Runners::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Runners::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀CbEnterpriseRcb🌀Actions🌀RunnerDashGroups🌀CbRunnerGroupIdRcb🌀Runners();
        }
        $operation = new Operation\EnterpriseAdmin\ListSelfHostedRunnersInGroupForEnterprise($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\CbEnterpriseRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Runners::class], $arguments['enterprise'], $arguments['runner_group_id'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\EnterpriseAdmin\ListSelfHostedRunnersInGroupForEnterprise\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function getDownloadStatusForPreReceiveEnvironmentStreaming(array $params)
    {
        $arguments = array();
        if (array_key_exists('pre_receive_environment_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: pre_receive_environment_id');
        }
        $arguments['pre_receive_environment_id'] = $params['pre_receive_environment_id'];
        unset($params['pre_receive_environment_id']);
        if (\array_key_exists(Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads\Latest::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads\Latest::class] = $this->hydrators->getObjectMapperOperation🌀Admin🌀PreDashReceiveDashEnvironments🌀CbPreReceiveEnvironmentIdRcb🌀Downloads🌀Latest();
        }
        $operation = new Operation\EnterpriseAdmin\GetDownloadStatusForPreReceiveEnvironmentStreaming($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Admin\PreDashReceiveDashEnvironments\CbPreReceiveEnvironmentIdRcb\Downloads\Latest::class], $this->browser, $arguments['pre_receive_environment_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\PreReceiveEnvironmentDownloadStatus {
            return $operation->createResponse($response);
        });
    }
}
