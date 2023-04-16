<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\AliasAbstract;

abstract readonly class Abstract8463f37da64144ef1bf426f5247a222a
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"code":{"type":"string"},"message":{"type":"string"}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"code":"generated_code_null","message":"generated_message_null"}';

    public function __construct(public ?string $code, public ?string $message)
    {
    }
}
