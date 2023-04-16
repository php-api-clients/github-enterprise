<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\AliasAbstract;

abstract readonly class Abstract7b1f87f42ca7f4e6f27ed1bcbfcee301
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"message":{"type":"string"}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"message":"generated_message_null"}';

    public function __construct(public ?string $message)
    {
    }
}
