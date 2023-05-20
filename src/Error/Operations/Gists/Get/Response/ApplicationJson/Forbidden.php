<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Error\Operations\Gists\Get\Response\ApplicationJson;

use ApiClients\Client\GitHubEnterprise\Schema;
use Error;

final class Forbidden extends Error
{
    public function __construct(public int $status, public Schema\Operations\Gists\Get\Response\ApplicationJson\Forbidden $error)
    {
    }
}
