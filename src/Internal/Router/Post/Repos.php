<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Router\Post;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\BranchWithProtection;
use ApiClients\Client\GitHubEnterprise\Schema\Commit;
use ApiClients\Client\GitHubEnterprise\Schema\CommitComment;
use ApiClients\Client\GitHubEnterprise\Schema\DeployKey;
use ApiClients\Client\GitHubEnterprise\Schema\Deployment;
use ApiClients\Client\GitHubEnterprise\Schema\DeploymentStatus;
use ApiClients\Client\GitHubEnterprise\Schema\FullRepository;
use ApiClients\Client\GitHubEnterprise\Schema\Hook;
use ApiClients\Client\GitHubEnterprise\Schema\MinimalRepository;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\Repos\CreateDeployment\Response\ApplicationJson\Accepted\Application\Json;
use ApiClients\Client\GitHubEnterprise\Schema\Page;
use ApiClients\Client\GitHubEnterprise\Schema\PageBuildStatus;
use ApiClients\Client\GitHubEnterprise\Schema\ProtectedBranchAdminEnforced;
use ApiClients\Client\GitHubEnterprise\Schema\Release;
use ApiClients\Client\GitHubEnterprise\Schema\ReleaseAsset;
use ApiClients\Client\GitHubEnterprise\Schema\Repository;
use ApiClients\Client\GitHubEnterprise\Schema\Status;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Repos
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return Schema\Repository|array{code:int} */
    public function createForAuthenticatedUser(array $params): Repository|array
    {
        $operator = new Internal\Operator\Repos\CreateForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀Repos());

        return $operator->call($params);
    }

    /** @return Schema\Deployment|Schema\Operations\Repos\CreateDeployment\Response\ApplicationJson\Accepted\Application\Json|array{code:int} */
    public function createDeployment(array $params): Deployment|Json|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\CreateDeployment($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Deployments());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return array{code:int} */
    public function createDispatchEvent(array $params): array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\CreateDispatchEvent($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Dispatches());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\FullRepository */
    public function createFork(array $params): FullRepository|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\CreateFork($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Forks());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\Hook */
    public function createWebhook(array $params): Hook|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\CreateWebhook($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Hooks());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\DeployKey */
    public function createDeployKey(array $params): DeployKey|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\CreateDeployKey($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Keys());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\Commit|array{code:int} */
    public function merge(array $params): Commit|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\Merge($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Merges());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\Page */
    public function createPagesSite(array $params): Page|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\CreatePagesSite($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Pages());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\Release */
    public function createRelease(array $params): Release|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\CreateRelease($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Releases());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\MinimalRepository */
    public function transfer(array $params): MinimalRepository|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\Transfer($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Transfer());

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    /** @return Schema\Repository */
    public function createUsingTemplate(array $params): Repository|array
    {
        $arguments = [];
        if (array_key_exists('template_owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: template_owner');
        }

        $arguments['template_owner'] = $params['template_owner'];
        unset($params['template_owner']);
        if (array_key_exists('template_repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: template_repo');
        }

        $arguments['template_repo'] = $params['template_repo'];
        unset($params['template_repo']);
        $operator = new Internal\Operator\Repos\CreateUsingTemplate($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀TemplateOwner🌀TemplateRepo🌀Generate());

        return $operator->call($arguments['template_owner'], $arguments['template_repo'], $params);
    }

    /** @return Schema\PageBuildStatus */
    public function requestPagesBuild(array $params): PageBuildStatus|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\Repos\RequestPagesBuild($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Pages🌀Builds());

        return $operator->call($arguments['owner'], $arguments['repo']);
    }

    /** @return Schema\Status */
    public function createCommitStatus(array $params): Status|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('sha', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: sha');
        }

        $arguments['sha'] = $params['sha'];
        unset($params['sha']);
        $operator = new Internal\Operator\Repos\CreateCommitStatus($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Statuses🌀Sha());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['sha'], $params);
    }

    /** @return Schema\Repository */
    public function createInOrg(array $params): Repository|array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        $operator = new Internal\Operator\Repos\CreateInOrg($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Repos());

        return $operator->call($arguments['org'], $params);
    }

    /** @return Schema\ProtectedBranchAdminEnforced */
    public function setAdminBranchProtection(array $params): ProtectedBranchAdminEnforced|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('branch', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: branch');
        }

        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        $operator = new Internal\Operator\Repos\SetAdminBranchProtection($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Branches🌀Branch🌀Protection🌀EnforceAdmins());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['branch']);
    }

    /** @return Schema\ProtectedBranchAdminEnforced */
    public function createCommitSignatureProtection(array $params): ProtectedBranchAdminEnforced|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('branch', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: branch');
        }

        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        $operator = new Internal\Operator\Repos\CreateCommitSignatureProtection($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Branches🌀Branch🌀Protection🌀RequiredSignatures());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['branch']);
    }

    /** @return Schema\BranchWithProtection */
    public function renameBranch(array $params): BranchWithProtection|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('branch', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: branch');
        }

        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        $operator = new Internal\Operator\Repos\RenameBranch($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Branches🌀Branch🌀Rename());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['branch'], $params);
    }

    /** @return Schema\CommitComment */
    public function createCommitComment(array $params): CommitComment|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('commit_sha', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: commit_sha');
        }

        $arguments['commit_sha'] = $params['commit_sha'];
        unset($params['commit_sha']);
        $operator = new Internal\Operator\Repos\CreateCommitComment($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Commits🌀CommitSha🌀Comments());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['commit_sha'], $params);
    }

    /** @return Schema\DeploymentStatus */
    public function createDeploymentStatus(array $params): DeploymentStatus|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('deployment_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: deployment_id');
        }

        $arguments['deployment_id'] = $params['deployment_id'];
        unset($params['deployment_id']);
        $operator = new Internal\Operator\Repos\CreateDeploymentStatus($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Deployments🌀DeploymentId🌀Statuses());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['deployment_id'], $params);
    }

    /** @return array{code:int} */
    public function pingWebhook(array $params): array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('hook_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: hook_id');
        }

        $arguments['hook_id'] = $params['hook_id'];
        unset($params['hook_id']);
        $operator = new Internal\Operator\Repos\PingWebhook($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Hooks🌀HookId🌀Pings());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['hook_id']);
    }

    /** @return array{code:int} */
    public function testPushWebhook(array $params): array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('hook_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: hook_id');
        }

        $arguments['hook_id'] = $params['hook_id'];
        unset($params['hook_id']);
        $operator = new Internal\Operator\Repos\TestPushWebhook($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Hooks🌀HookId🌀Tests());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['hook_id']);
    }

    /** @return Schema\ReleaseAsset|array{code:int} */
    public function uploadReleaseAsset(array $params): ReleaseAsset|array
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('release_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: release_id');
        }

        $arguments['release_id'] = $params['release_id'];
        unset($params['release_id']);
        if (array_key_exists('name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: name');
        }

        $arguments['name'] = $params['name'];
        unset($params['name']);
        if (array_key_exists('label', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: label');
        }

        $arguments['label'] = $params['label'];
        unset($params['label']);
        $operator = new Internal\Operator\Repos\UploadReleaseAsset($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Releases🌀ReleaseId🌀Assets());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['release_id'], $arguments['name'], $arguments['label'], $params);
    }

    /** @return iterable<string> */
    public function addStatusCheckContexts(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('branch', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: branch');
        }

        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        $operator = new Internal\Operator\Repos\AddStatusCheckContexts($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Branches🌀Branch🌀Protection🌀RequiredStatusChecks🌀Contexts());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['branch'], $params);
    }

    /** @return iterable<Schema\Integration> */
    public function addAppAccessRestrictions(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('branch', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: branch');
        }

        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        $operator = new Internal\Operator\Repos\AddAppAccessRestrictions($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Branches🌀Branch🌀Protection🌀Restrictions🌀Apps());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['branch'], $params);
    }

    /** @return iterable<Schema\Team> */
    public function addTeamAccessRestrictions(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('branch', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: branch');
        }

        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        $operator = new Internal\Operator\Repos\AddTeamAccessRestrictions($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Branches🌀Branch🌀Protection🌀Restrictions🌀Teams());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['branch'], $params);
    }

    /** @return iterable<Schema\SimpleUser> */
    public function addUserAccessRestrictions(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('branch', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: branch');
        }

        $arguments['branch'] = $params['branch'];
        unset($params['branch']);
        $operator = new Internal\Operator\Repos\AddUserAccessRestrictions($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Branches🌀Branch🌀Protection🌀Restrictions🌀Users());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['branch'], $params);
    }
}
