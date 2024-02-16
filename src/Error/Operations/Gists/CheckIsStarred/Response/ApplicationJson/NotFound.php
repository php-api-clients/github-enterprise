<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Error\Operations\Gists\CheckIsStarred\Response\ApplicationJson;

use ApiClients\Client\GitHubEnterprise\Schema;
use Error;

final class NotFound extends Error
{
    public function __construct(public int $status, public Schema\Operations\Gists\CheckIsStarred\Response\ApplicationJson\NotFound $error)
    {
    }
}
