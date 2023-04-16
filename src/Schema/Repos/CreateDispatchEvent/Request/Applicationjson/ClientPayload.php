<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema\Repos\CreateDispatchEvent\Request\Applicationjson;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final readonly class ClientPayload
{
    public const SCHEMA_JSON = '{"maxProperties":10,"type":"object","description":"JSON payload with extra information about the webhook event that your action or worklow may use.","additionalProperties":true}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = 'JSON payload with extra information about the webhook event that your action or worklow may use.';
    public const SCHEMA_EXAMPLE_DATA = '[]';
    public function __construct()
    {
    }
}
