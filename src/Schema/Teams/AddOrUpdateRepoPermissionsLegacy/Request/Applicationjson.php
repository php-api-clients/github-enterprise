<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\Teams\AddOrUpdateRepoPermissionsLegacy\Request;

final readonly class Applicationjson
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"permission":{"enum":["pull","push","admin"],"type":"string","description":"The permission to grant the team on this repository. If no permission is specified, the team\'s `permission` attribute will be used to determine what permission to grant the team on this repository."}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"permission":"pull"}';

    /**
     * permission: The permission to grant the team on this repository. If no permission is specified, the team's `permission` attribute will be used to determine what permission to grant the team on this repository.
     */
    public function __construct(public ?string $permission)
    {
    }
}
