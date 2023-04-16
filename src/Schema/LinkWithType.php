<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema;

final readonly class LinkWithType
{
    public const SCHEMA_JSON         = '{"title":"Link With Type","required":["href","type"],"type":"object","properties":{"href":{"type":"string"},"type":{"type":"string"}},"description":"Hypermedia Link with Type"}';
    public const SCHEMA_TITLE        = 'Link With Type';
    public const SCHEMA_DESCRIPTION  = 'Hypermedia Link with Type';
    public const SCHEMA_EXAMPLE_DATA = '{"href":"generated_href_null","type":"generated_type_null"}';

    public function __construct(public string $href, public string $type)
    {
    }
}
