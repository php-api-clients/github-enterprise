<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\Actions\SetRepoAccessToSelfHostedRunnerGroupInOrg\Request;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class Applicationjson
{
    public const SCHEMA_JSON         = '{"required":["selected_repository_ids"],"type":"object","properties":{"selected_repository_ids":{"type":"array","items":{"type":"integer","description":"Unique identifier of the repository."},"description":"List of repository IDs that can access the runner group."}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"selected_repository_ids":[13]}';

    /**
     * selectedRepositoryIds: List of repository IDs that can access the runner group.
     *
     * @param array<int> $selectedRepositoryIds
     */
    public function __construct(#[MapFrom('selected_repository_ids')] public array $selectedRepositoryIds)
    {
    }
}
