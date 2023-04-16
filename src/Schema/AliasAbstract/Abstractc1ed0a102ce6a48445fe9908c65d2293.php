<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\AliasAbstract;

abstract readonly class Abstractc1ed0a102ce6a48445fe9908c65d2293
{
    public const SCHEMA_JSON         = '{"required":["runners"],"type":"object","properties":{"runners":{"type":"array","items":{"type":"integer","description":"Unique identifier of the runner."},"description":"List of runner IDs to add to the runner group."}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"runners":[13]}';

    /**
     * runners: List of runner IDs to add to the runner group.
     *
     * @param array<int> $runners
     */
    public function __construct(public array $runners)
    {
    }
}
