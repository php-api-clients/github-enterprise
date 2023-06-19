<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\WebhookCheckSuiteRerequested\ActionsMeta;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class RerunInfo
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"plan_id":{"type":"string"},"job_ids":{"type":"array","items":{"type":"string"}}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"plan_id":"generated","job_ids":["generated","generated"]}';

    public function __construct(#[MapFrom('plan_id')]
    public string|null $planId, #[MapFrom('job_ids')]
    public array|null $jobIds,)
    {
    }
}
