<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\Repository\TemplateRepository;

final readonly class Permissions
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"admin":{"type":"boolean"},"maintain":{"type":"boolean"},"push":{"type":"boolean"},"triage":{"type":"boolean"},"pull":{"type":"boolean"}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"admin":false,"maintain":false,"push":false,"triage":false,"pull":false}';

    public function __construct(public ?bool $admin, public ?bool $maintain, public ?bool $push, public ?bool $triage, public ?bool $pull)
    {
    }
}
