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
final readonly class PageBuildStatus
{
    public const SCHEMA_JSON = '{"title":"Page Build Status","required":["url","status"],"type":"object","properties":{"url":{"type":"string","format":"uri","examples":["https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/pages\\/builds\\/latest"]},"status":{"type":"string","examples":["queued"]}},"description":"Page Build Status"}';
    public const SCHEMA_TITLE = 'Page Build Status';
    public const SCHEMA_DESCRIPTION = 'Page Build Status';
    public const SCHEMA_EXAMPLE_DATA = '{"url":"https:\\/\\/api.github.com\\/repos\\/github\\/hello-world\\/pages\\/builds\\/latest","status":"queued"}';
    public function __construct(public string $url, public string $status)
    {
    }
}
