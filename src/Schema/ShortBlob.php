<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final readonly class ShortBlob
{
    public const SCHEMA_JSON = '{"title":"Short Blob","required":["url","sha"],"type":"object","properties":{"url":{"type":"string"},"sha":{"type":"string"}},"description":"Short Blob"}';
    public const SCHEMA_TITLE = 'Short Blob';
    public const SCHEMA_DESCRIPTION = 'Short Blob';
    public const SCHEMA_EXAMPLE_DATA = '{"url":"generated_url_null","sha":"generated_sha_null"}';
    public function __construct(public string $url, public string $sha)
    {
    }
}
