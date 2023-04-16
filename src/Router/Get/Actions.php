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
final class Actions
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
    public function listSelectedRepositoriesEnabledGithubActionsOrganization(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions\Repositories::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions\Repositories::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Permissions🌀Repositories();
        }
        $operation = new Operation\Actions\ListSelectedRepositoriesEnabledGithubActionsOrganization($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions\Repositories::class], $arguments['org'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListSelectedRepositoriesEnabledGithubActionsOrganization\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function getAllowedActionsOrganization(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions\SelectedActions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions\SelectedActions::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Permissions🌀SelectedActions();
        }
        $operation = new Operation\Actions\GetAllowedActionsOrganization($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions\SelectedActions::class], $arguments['org']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\SelectedActions {
            return $operation->createResponse($response);
        });
    }
    public function getSelfHostedRunnerGroupForOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_group_id');
        }
        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀RunnerDashGroups🌀CbRunnerGroupIdRcb();
        }
        $operation = new Operation\Actions\GetSelfHostedRunnerGroupForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb::class], $arguments['org'], $arguments['runner_group_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\RunnerGroupsOrg {
            return $operation->createResponse($response);
        });
    }
    public function listRunnerApplicationsForOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\Downloads::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\Downloads::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Runners🌀Downloads();
        }
        $operation = new Operation\Actions\ListRunnerApplicationsForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\Downloads::class], $arguments['org']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getSelfHostedRunnerForOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('runner_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_id');
        }
        $arguments['runner_id'] = $params['runner_id'];
        unset($params['runner_id']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\CbRunnerIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\CbRunnerIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Runners🌀CbRunnerIdRcb();
        }
        $operation = new Operation\Actions\GetSelfHostedRunnerForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners\CbRunnerIdRcb::class], $arguments['org'], $arguments['runner_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Runner {
            return $operation->createResponse($response);
        });
    }
    public function getOrgPublicKey(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\PublicKey::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\PublicKey::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Secrets🌀PublicKey();
        }
        $operation = new Operation\Actions\GetOrgPublicKey($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\PublicKey::class], $arguments['org']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsPublicKey {
            return $operation->createResponse($response);
        });
    }
    public function getOrgSecret(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('secret_name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: secret_name');
        }
        $arguments['secret_name'] = $params['secret_name'];
        unset($params['secret_name']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\CbSecretNameRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\CbSecretNameRcb::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Secrets🌀CbSecretNameRcb();
        }
        $operation = new Operation\Actions\GetOrgSecret($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\CbSecretNameRcb::class], $arguments['org'], $arguments['secret_name']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\OrganizationActionsSecret {
            return $operation->createResponse($response);
        });
    }
    public function listArtifactsForRepo(array $params)
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
        if (array_key_exists('name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: name');
        }
        $arguments['name'] = $params['name'];
        unset($params['name']);
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Artifacts();
        }
        $operation = new Operation\Actions\ListArtifactsForRepo($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts::class], $arguments['owner'], $arguments['repo'], $arguments['name'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListArtifactsForRepo\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function getGithubActionsPermissionsRepository(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Permissions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Permissions::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Permissions();
        }
        $operation = new Operation\Actions\GetGithubActionsPermissionsRepository($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Permissions::class], $arguments['owner'], $arguments['repo']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsRepositoryPermissions {
            return $operation->createResponse($response);
        });
    }
    public function listSelfHostedRunnersForRepo(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runners();
        }
        $operation = new Operation\Actions\ListSelfHostedRunnersForRepo($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners::class], $arguments['owner'], $arguments['repo'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListSelfHostedRunnersForRepo\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listWorkflowRunsForRepo(array $params)
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
        if (array_key_exists('actor', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: actor');
        }
        $arguments['actor'] = $params['actor'];
        unset($params['actor']);
        if (array_key_exists('branch', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: branch');
        }
        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        if (array_key_exists('event', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: event');
        }
        $arguments['event'] = $params['event'];
        unset($params['event']);
        if (array_key_exists('status', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: status');
        }
        $arguments['status'] = $params['status'];
        unset($params['status']);
        if (array_key_exists('created', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: created');
        }
        $arguments['created'] = $params['created'];
        unset($params['created']);
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
        if (array_key_exists('exclude_pull_requests', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: exclude_pull_requests');
        }
        $arguments['exclude_pull_requests'] = $params['exclude_pull_requests'];
        unset($params['exclude_pull_requests']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runs();
        }
        $operation = new Operation\Actions\ListWorkflowRunsForRepo($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs::class], $arguments['owner'], $arguments['repo'], $arguments['actor'], $arguments['branch'], $arguments['event'], $arguments['status'], $arguments['created'], $arguments['per_page'], $arguments['page'], $arguments['exclude_pull_requests']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListWorkflowRunsForRepo\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listRepoSecrets(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Secrets();
        }
        $operation = new Operation\Actions\ListRepoSecrets($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets::class], $arguments['owner'], $arguments['repo'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListRepoSecrets\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listRepoWorkflows(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Workflows();
        }
        $operation = new Operation\Actions\ListRepoWorkflows($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows::class], $arguments['owner'], $arguments['repo'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListRepoWorkflows\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listEnvironmentSecrets(array $params)
    {
        $arguments = array();
        if (array_key_exists('repository_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repository_id');
        }
        $arguments['repository_id'] = $params['repository_id'];
        unset($params['repository_id']);
        if (array_key_exists('environment_name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: environment_name');
        }
        $arguments['environment_name'] = $params['environment_name'];
        unset($params['environment_name']);
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
        if (\array_key_exists(Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets::class] = $this->hydrators->getObjectMapperOperation🌀Repositories🌀CbRepositoryIdRcb🌀Environments🌀CbEnvironmentNameRcb🌀Secrets();
        }
        $operation = new Operation\Actions\ListEnvironmentSecrets($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets::class], $arguments['repository_id'], $arguments['environment_name'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListEnvironmentSecrets\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function getGithubActionsPermissionsOrganization(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Permissions();
        }
        $operation = new Operation\Actions\GetGithubActionsPermissionsOrganization($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Permissions::class], $arguments['org']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsOrganizationPermissions {
            return $operation->createResponse($response);
        });
    }
    public function listSelfHostedRunnerGroupsForOrg(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerGroups::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerGroups::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀RunnerGroups();
        }
        $operation = new Operation\Actions\ListSelfHostedRunnerGroupsForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerGroups::class], $arguments['org'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListSelfHostedRunnerGroupsForOrg\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listSelfHostedRunnersForOrg(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Runners();
        }
        $operation = new Operation\Actions\ListSelfHostedRunnersForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Runners::class], $arguments['org'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListSelfHostedRunnersForOrg\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listOrgSecrets(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Secrets();
        }
        $operation = new Operation\Actions\ListOrgSecrets($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets::class], $arguments['org'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListOrgSecrets\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listRepoAccessToSelfHostedRunnerGroupInOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_group_id');
        }
        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Repositories::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Repositories::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀RunnerDashGroups🌀CbRunnerGroupIdRcb🌀Repositories();
        }
        $operation = new Operation\Actions\ListRepoAccessToSelfHostedRunnerGroupInOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Repositories::class], $arguments['org'], $arguments['runner_group_id'], $arguments['page'], $arguments['per_page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListRepoAccessToSelfHostedRunnerGroupInOrg\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listSelfHostedRunnersInGroupForOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
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
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Runners::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Runners::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀RunnerDashGroups🌀CbRunnerGroupIdRcb🌀Runners();
        }
        $operation = new Operation\Actions\ListSelfHostedRunnersInGroupForOrg($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\RunnerDashGroups\CbRunnerGroupIdRcb\Runners::class], $arguments['org'], $arguments['runner_group_id'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListSelfHostedRunnersInGroupForOrg\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listSelectedReposForOrgSecret(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('secret_name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: secret_name');
        }
        $arguments['secret_name'] = $params['secret_name'];
        unset($params['secret_name']);
        if (array_key_exists('page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: page');
        }
        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('per_page', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: per_page');
        }
        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\CbSecretNameRcb\Repositories::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\CbSecretNameRcb\Repositories::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Actions🌀Secrets🌀CbSecretNameRcb🌀Repositories();
        }
        $operation = new Operation\Actions\ListSelectedReposForOrgSecret($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Actions\Secrets\CbSecretNameRcb\Repositories::class], $arguments['org'], $arguments['secret_name'], $arguments['page'], $arguments['per_page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListSelectedReposForOrgSecret\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function getArtifact(array $params)
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
        if (array_key_exists('artifact_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: artifact_id');
        }
        $arguments['artifact_id'] = $params['artifact_id'];
        unset($params['artifact_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Artifacts🌀CbArtifactIdRcb();
        }
        $operation = new Operation\Actions\GetArtifact($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb::class], $arguments['owner'], $arguments['repo'], $arguments['artifact_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Artifact {
            return $operation->createResponse($response);
        });
    }
    public function getJobForWorkflowRun(array $params)
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
        if (array_key_exists('job_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: job_id');
        }
        $arguments['job_id'] = $params['job_id'];
        unset($params['job_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Jobs\CbJobIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Jobs\CbJobIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Jobs🌀CbJobIdRcb();
        }
        $operation = new Operation\Actions\GetJobForWorkflowRun($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Jobs\CbJobIdRcb::class], $arguments['owner'], $arguments['repo'], $arguments['job_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Job {
            return $operation->createResponse($response);
        });
    }
    public function getAllowedActionsRepository(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Permissions\SelectedActions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Permissions\SelectedActions::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Permissions🌀SelectedActions();
        }
        $operation = new Operation\Actions\GetAllowedActionsRepository($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Permissions\SelectedActions::class], $arguments['owner'], $arguments['repo']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\SelectedActions {
            return $operation->createResponse($response);
        });
    }
    public function listRunnerApplicationsForRepo(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners\Downloads::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners\Downloads::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runners🌀Downloads();
        }
        $operation = new Operation\Actions\ListRunnerApplicationsForRepo($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners\Downloads::class], $arguments['owner'], $arguments['repo']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function getSelfHostedRunnerForRepo(array $params)
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
        if (array_key_exists('runner_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: runner_id');
        }
        $arguments['runner_id'] = $params['runner_id'];
        unset($params['runner_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners\CbRunnerIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners\CbRunnerIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runners🌀CbRunnerIdRcb();
        }
        $operation = new Operation\Actions\GetSelfHostedRunnerForRepo($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runners\CbRunnerIdRcb::class], $arguments['owner'], $arguments['repo'], $arguments['runner_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Runner {
            return $operation->createResponse($response);
        });
    }
    public function getWorkflowRun(array $params)
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
        if (array_key_exists('run_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: run_id');
        }
        $arguments['run_id'] = $params['run_id'];
        unset($params['run_id']);
        if (array_key_exists('exclude_pull_requests', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: exclude_pull_requests');
        }
        $arguments['exclude_pull_requests'] = $params['exclude_pull_requests'];
        unset($params['exclude_pull_requests']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runs🌀CbRunIdRcb();
        }
        $operation = new Operation\Actions\GetWorkflowRun($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb::class], $arguments['owner'], $arguments['repo'], $arguments['run_id'], $arguments['exclude_pull_requests']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\WorkflowRun {
            return $operation->createResponse($response);
        });
    }
    public function getRepoPublicKey(array $params)
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets\PublicKey::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets\PublicKey::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Secrets🌀PublicKey();
        }
        $operation = new Operation\Actions\GetRepoPublicKey($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets\PublicKey::class], $arguments['owner'], $arguments['repo']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsPublicKey {
            return $operation->createResponse($response);
        });
    }
    public function getRepoSecret(array $params)
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
        if (array_key_exists('secret_name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: secret_name');
        }
        $arguments['secret_name'] = $params['secret_name'];
        unset($params['secret_name']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets\CbSecretNameRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets\CbSecretNameRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Secrets🌀CbSecretNameRcb();
        }
        $operation = new Operation\Actions\GetRepoSecret($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Secrets\CbSecretNameRcb::class], $arguments['owner'], $arguments['repo'], $arguments['secret_name']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsSecret {
            return $operation->createResponse($response);
        });
    }
    public function getWorkflow(array $params)
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
        if (array_key_exists('workflow_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: workflow_id');
        }
        $arguments['workflow_id'] = $params['workflow_id'];
        unset($params['workflow_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows\CbWorkflowIdRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows\CbWorkflowIdRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Workflows🌀CbWorkflowIdRcb();
        }
        $operation = new Operation\Actions\GetWorkflow($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows\CbWorkflowIdRcb::class], $arguments['owner'], $arguments['repo'], $arguments['workflow_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Workflow {
            return $operation->createResponse($response);
        });
    }
    public function getEnvironmentPublicKey(array $params)
    {
        $arguments = array();
        if (array_key_exists('repository_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repository_id');
        }
        $arguments['repository_id'] = $params['repository_id'];
        unset($params['repository_id']);
        if (array_key_exists('environment_name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: environment_name');
        }
        $arguments['environment_name'] = $params['environment_name'];
        unset($params['environment_name']);
        if (\array_key_exists(Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets\PublicDashKey::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets\PublicDashKey::class] = $this->hydrators->getObjectMapperOperation🌀Repositories🌀CbRepositoryIdRcb🌀Environments🌀CbEnvironmentNameRcb🌀Secrets🌀PublicDashKey();
        }
        $operation = new Operation\Actions\GetEnvironmentPublicKey($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets\PublicDashKey::class], $arguments['repository_id'], $arguments['environment_name']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsPublicKey {
            return $operation->createResponse($response);
        });
    }
    public function getEnvironmentSecret(array $params)
    {
        $arguments = array();
        if (array_key_exists('repository_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repository_id');
        }
        $arguments['repository_id'] = $params['repository_id'];
        unset($params['repository_id']);
        if (array_key_exists('environment_name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: environment_name');
        }
        $arguments['environment_name'] = $params['environment_name'];
        unset($params['environment_name']);
        if (array_key_exists('secret_name', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: secret_name');
        }
        $arguments['secret_name'] = $params['secret_name'];
        unset($params['secret_name']);
        if (\array_key_exists(Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets\CbSecretNameRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets\CbSecretNameRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repositories🌀CbRepositoryIdRcb🌀Environments🌀CbEnvironmentNameRcb🌀Secrets🌀CbSecretNameRcb();
        }
        $operation = new Operation\Actions\GetEnvironmentSecret($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets\CbSecretNameRcb::class], $arguments['repository_id'], $arguments['environment_name'], $arguments['secret_name']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\ActionsSecret {
            return $operation->createResponse($response);
        });
    }
    public function downloadArtifact(array $params)
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
        if (array_key_exists('artifact_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: artifact_id');
        }
        $arguments['artifact_id'] = $params['artifact_id'];
        unset($params['artifact_id']);
        if (array_key_exists('archive_format', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: archive_format');
        }
        $arguments['archive_format'] = $params['archive_format'];
        unset($params['archive_format']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb\CbArchiveFormatRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb\CbArchiveFormatRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Artifacts🌀CbArtifactIdRcb🌀CbArchiveFormatRcb();
        }
        $operation = new Operation\Actions\DownloadArtifact($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb\CbArchiveFormatRcb::class], $arguments['owner'], $arguments['repo'], $arguments['artifact_id'], $arguments['archive_format']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \array {
            return $operation->createResponse($response);
        });
    }
    public function downloadJobLogsForWorkflowRun(array $params)
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
        if (array_key_exists('job_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: job_id');
        }
        $arguments['job_id'] = $params['job_id'];
        unset($params['job_id']);
        $operation = new Operation\Actions\DownloadJobLogsForWorkflowRun($arguments['owner'], $arguments['repo'], $arguments['job_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \array {
            return $operation->createResponse($response);
        });
    }
    public function getReviewsForRun(array $params)
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
        if (array_key_exists('run_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: run_id');
        }
        $arguments['run_id'] = $params['run_id'];
        unset($params['run_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Approvals::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Approvals::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runs🌀CbRunIdRcb🌀Approvals();
        }
        $operation = new Operation\Actions\GetReviewsForRun($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Approvals::class], $arguments['owner'], $arguments['repo'], $arguments['run_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listWorkflowRunArtifacts(array $params)
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
        if (array_key_exists('run_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: run_id');
        }
        $arguments['run_id'] = $params['run_id'];
        unset($params['run_id']);
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Artifacts::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Artifacts::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runs🌀CbRunIdRcb🌀Artifacts();
        }
        $operation = new Operation\Actions\ListWorkflowRunArtifacts($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Artifacts::class], $arguments['owner'], $arguments['repo'], $arguments['run_id'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListWorkflowRunArtifacts\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function listJobsForWorkflowRun(array $params)
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
        if (array_key_exists('run_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: run_id');
        }
        $arguments['run_id'] = $params['run_id'];
        unset($params['run_id']);
        if (array_key_exists('filter', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: filter');
        }
        $arguments['filter'] = $params['filter'];
        unset($params['filter']);
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
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Jobs::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Jobs::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runs🌀CbRunIdRcb🌀Jobs();
        }
        $operation = new Operation\Actions\ListJobsForWorkflowRun($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\Jobs::class], $arguments['owner'], $arguments['repo'], $arguments['run_id'], $arguments['filter'], $arguments['per_page'], $arguments['page']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListJobsForWorkflowRun\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function downloadWorkflowRunLogs(array $params)
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
        if (array_key_exists('run_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: run_id');
        }
        $arguments['run_id'] = $params['run_id'];
        unset($params['run_id']);
        $operation = new Operation\Actions\DownloadWorkflowRunLogs($arguments['owner'], $arguments['repo'], $arguments['run_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \array {
            return $operation->createResponse($response);
        });
    }
    public function getPendingDeploymentsForRun(array $params)
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
        if (array_key_exists('run_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: run_id');
        }
        $arguments['run_id'] = $params['run_id'];
        unset($params['run_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\PendingDeployments::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\PendingDeployments::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Runs🌀CbRunIdRcb🌀PendingDeployments();
        }
        $operation = new Operation\Actions\GetPendingDeploymentsForRun($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Runs\CbRunIdRcb\PendingDeployments::class], $arguments['owner'], $arguments['repo'], $arguments['run_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function listWorkflowRuns(array $params)
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
        if (array_key_exists('workflow_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: workflow_id');
        }
        $arguments['workflow_id'] = $params['workflow_id'];
        unset($params['workflow_id']);
        if (array_key_exists('actor', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: actor');
        }
        $arguments['actor'] = $params['actor'];
        unset($params['actor']);
        if (array_key_exists('branch', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: branch');
        }
        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        if (array_key_exists('event', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: event');
        }
        $arguments['event'] = $params['event'];
        unset($params['event']);
        if (array_key_exists('status', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: status');
        }
        $arguments['status'] = $params['status'];
        unset($params['status']);
        if (array_key_exists('created', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: created');
        }
        $arguments['created'] = $params['created'];
        unset($params['created']);
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
        if (array_key_exists('exclude_pull_requests', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: exclude_pull_requests');
        }
        $arguments['exclude_pull_requests'] = $params['exclude_pull_requests'];
        unset($params['exclude_pull_requests']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows\CbWorkflowIdRcb\Runs::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows\CbWorkflowIdRcb\Runs::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Workflows🌀CbWorkflowIdRcb🌀Runs();
        }
        $operation = new Operation\Actions\ListWorkflowRuns($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Workflows\CbWorkflowIdRcb\Runs::class], $arguments['owner'], $arguments['repo'], $arguments['workflow_id'], $arguments['actor'], $arguments['branch'], $arguments['event'], $arguments['status'], $arguments['created'], $arguments['per_page'], $arguments['page'], $arguments['exclude_pull_requests']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Operation\Actions\ListWorkflowRuns\Response\Applicationjson\H200 {
            return $operation->createResponse($response);
        });
    }
    public function downloadArtifactStreaming(array $params)
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
        if (array_key_exists('artifact_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: artifact_id');
        }
        $arguments['artifact_id'] = $params['artifact_id'];
        unset($params['artifact_id']);
        if (array_key_exists('archive_format', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: archive_format');
        }
        $arguments['archive_format'] = $params['archive_format'];
        unset($params['archive_format']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb\CbArchiveFormatRcb::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb\CbArchiveFormatRcb::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Actions🌀Artifacts🌀CbArtifactIdRcb🌀CbArchiveFormatRcb();
        }
        $operation = new Operation\Actions\DownloadArtifactStreaming($this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Actions\Artifacts\CbArtifactIdRcb\CbArchiveFormatRcb::class], $this->browser, $arguments['owner'], $arguments['repo'], $arguments['artifact_id'], $arguments['archive_format']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function downloadJobLogsForWorkflowRunStreaming(array $params)
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
        if (array_key_exists('job_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: job_id');
        }
        $arguments['job_id'] = $params['job_id'];
        unset($params['job_id']);
        $operation = new Operation\Actions\DownloadJobLogsForWorkflowRunStreaming($this->browser, $arguments['owner'], $arguments['repo'], $arguments['job_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
    public function downloadWorkflowRunLogsStreaming(array $params)
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
        if (array_key_exists('run_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: run_id');
        }
        $arguments['run_id'] = $params['run_id'];
        unset($params['run_id']);
        $operation = new Operation\Actions\DownloadWorkflowRunLogsStreaming($this->browser, $arguments['owner'], $arguments['repo'], $arguments['run_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \Rx\Observable {
            return $operation->createResponse($response);
        });
    }
}
