<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Router\Delete;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Apps
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return array{code:int} */
    public function deleteInstallation(array $params): array
    {
        $arguments = [];
        if (array_key_exists('installation_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: installation_id');
        }

        $arguments['installation_id'] = $params['installation_id'];
        unset($params['installation_id']);
        $operator = new Internal\Operator\Apps\DeleteInstallation($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀App🌀Installations🌀InstallationId());

        return $operator->call($arguments['installation_id']);
    }

    /** @return array{code:int} */
    public function deleteAuthorization(array $params): array
    {
        $arguments = [];
        if (array_key_exists('client_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: client_id');
        }

        $arguments['client_id'] = $params['client_id'];
        unset($params['client_id']);
        $operator = new Internal\Operator\Apps\DeleteAuthorization($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Applications🌀ClientId🌀Grant());

        return $operator->call($arguments['client_id'], $params);
    }

    /** @return array{code:int} */
    public function deleteToken(array $params): array
    {
        $arguments = [];
        if (array_key_exists('client_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: client_id');
        }

        $arguments['client_id'] = $params['client_id'];
        unset($params['client_id']);
        $operator = new Internal\Operator\Apps\DeleteToken($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Applications🌀ClientId🌀Token());

        return $operator->call($arguments['client_id'], $params);
    }

    /** @return array{code:int} */
    public function unsuspendInstallation(array $params): array
    {
        $arguments = [];
        if (array_key_exists('installation_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: installation_id');
        }

        $arguments['installation_id'] = $params['installation_id'];
        unset($params['installation_id']);
        $operator = new Internal\Operator\Apps\UnsuspendInstallation($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀App🌀Installations🌀InstallationId🌀Suspended());

        return $operator->call($arguments['installation_id']);
    }

    /** @return array{code:int} */
    public function revokeGrantForApplication(array $params): array
    {
        $arguments = [];
        if (array_key_exists('client_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: client_id');
        }

        $arguments['client_id'] = $params['client_id'];
        unset($params['client_id']);
        if (array_key_exists('access_token', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: access_token');
        }

        $arguments['access_token'] = $params['access_token'];
        unset($params['access_token']);
        $operator = new Internal\Operator\Apps\RevokeGrantForApplication($this->browser, $this->authentication);

        return $operator->call($arguments['client_id'], $arguments['access_token']);
    }

    /** @return array{code:int} */
    public function revokeAuthorizationForApplication(array $params): array
    {
        $arguments = [];
        if (array_key_exists('client_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: client_id');
        }

        $arguments['client_id'] = $params['client_id'];
        unset($params['client_id']);
        if (array_key_exists('access_token', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: access_token');
        }

        $arguments['access_token'] = $params['access_token'];
        unset($params['access_token']);
        $operator = new Internal\Operator\Apps\RevokeAuthorizationForApplication($this->browser, $this->authentication);

        return $operator->call($arguments['client_id'], $arguments['access_token']);
    }

    /** @return array{code:int} */
    public function revokeInstallationAccessToken(array $params): array
    {
        $operator = new Internal\Operator\Apps\RevokeInstallationAccessToken($this->browser, $this->authentication);

        return $operator->call();
    }

    /** @return array{code:int} */
    public function removeRepoFromInstallationForAuthenticatedUser(array $params): array
    {
        $arguments = [];
        if (array_key_exists('installation_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: installation_id');
        }

        $arguments['installation_id'] = $params['installation_id'];
        unset($params['installation_id']);
        if (array_key_exists('repository_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repository_id');
        }

        $arguments['repository_id'] = $params['repository_id'];
        unset($params['repository_id']);
        $operator = new Internal\Operator\Apps\RemoveRepoFromInstallationForAuthenticatedUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀Installations🌀InstallationId🌀Repositories🌀RepositoryId());

        return $operator->call($arguments['installation_id'], $arguments['repository_id']);
    }
}
