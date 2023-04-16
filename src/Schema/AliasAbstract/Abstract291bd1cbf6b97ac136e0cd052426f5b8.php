<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\AliasAbstract;

abstract readonly class Abstract291bd1cbf6b97ac136e0cd052426f5b8
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"date":{"type":"string"},"name":{"type":"string"},"email":{"type":"string"}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"date":"generated_date_null","name":"generated_name_null","email":"generated_email_null"}';

    public function __construct(public ?string $date, public ?string $name, public ?string $email)
    {
    }
}
