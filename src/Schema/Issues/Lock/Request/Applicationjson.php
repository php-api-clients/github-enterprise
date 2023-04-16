<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema\Issues\Lock\Request;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"type":["object","null"],"properties":{"lock_reason":{"enum":["off-topic","too heated","resolved","spam"],"type":"string","description":"The reason for locking the issue or pull request conversation. Lock will fail if you don\'t use one of these reasons:  \\n\\\\* `off-topic`  \\n\\\\* `too heated`  \\n\\\\* `resolved`  \\n\\\\* `spam`"}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"lock_reason":"off-topic"}';
    /**
    * lockReason: The reason for locking the issue or pull request conversation. Lock will fail if you don't use one of these reasons:  
    \* `off-topic`  
    \* `too heated`  
    \* `resolved`  
    \* `spam`
    */
    public function __construct(#[\EventSauce\ObjectHydrator\MapFrom('lock_reason')] public ?string $lockReason)
    {
    }
}
