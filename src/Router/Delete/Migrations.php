<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Delete;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Operator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Migrations
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return array{code:int} */
    public function deleteArchiveForOrg(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('migration_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: migration_id');
        }

        $arguments['migration_id'] = $params['migration_id'];
        unset($params['migration_id']);
        $operator = new Operator\Migrations\DeleteArchiveForOrg($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Migrations🌀MigrationId🌀Archive());

        return $operator->call($arguments['org'], $arguments['migration_id']);
    }

    /** @return array{code:int} */
    public function unlockRepoForOrg(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('migration_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: migration_id');
        }

        $arguments['migration_id'] = $params['migration_id'];
        unset($params['migration_id']);
        if (array_key_exists('repo_name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo_name');
        }

        $arguments['repo_name'] = $params['repo_name'];
        unset($params['repo_name']);
        $operator = new Operator\Migrations\UnlockRepoForOrg($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Migrations🌀MigrationId🌀Repos🌀RepoName🌀Lock());

        return $operator->call($arguments['org'], $arguments['migration_id'], $arguments['repo_name']);
    }
}
