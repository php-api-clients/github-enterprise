<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Error;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class ValidationErrorSimple extends \Error
{
    public function __construct(public int $status, public Schema\ValidationErrorSimple $error)
    {
    }
}
