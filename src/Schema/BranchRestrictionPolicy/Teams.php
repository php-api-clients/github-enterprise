<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\BranchRestrictionPolicy;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class Teams
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"id":{"type":"integer"},"node_id":{"type":"string"},"url":{"type":"string"},"html_url":{"type":"string"},"name":{"type":"string"},"slug":{"type":"string"},"description":{"type":["string","null"]},"privacy":{"type":"string"},"permission":{"type":"string"},"members_url":{"type":"string"},"repositories_url":{"type":"string"},"parent":{"type":["string","null"]}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"id":2,"node_id":"generated","url":"generated","html_url":"generated","name":"generated","slug":"generated","description":"generated","privacy":"generated","permission":"generated","members_url":"generated","repositories_url":"generated","parent":"generated"}';

    public function __construct(public ?int $id, #[MapFrom('node_id')] public ?string $nodeId, public ?string $url, #[MapFrom('html_url')] public ?string $htmlUrl, public ?string $name, public ?string $slug, public ?string $description, public ?string $privacy, public ?string $permission, #[MapFrom('members_url')] public ?string $membersUrl, #[MapFrom('repositories_url')] public ?string $repositoriesUrl, public ?string $parent)
    {
    }
}
