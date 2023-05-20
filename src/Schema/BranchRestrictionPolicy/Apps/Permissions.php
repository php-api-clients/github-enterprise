<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\BranchRestrictionPolicy\Apps;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class Permissions
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"metadata":{"type":"string"},"contents":{"type":"string"},"issues":{"type":"string"},"single_file":{"type":"string"}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"metadata":"generated","contents":"generated","issues":"generated","single_file":"generated"}';

    public function __construct(public ?string $metadata, public ?string $contents, public ?string $issues, #[MapFrom('single_file')] public ?string $singleFile)
    {
    }
}
