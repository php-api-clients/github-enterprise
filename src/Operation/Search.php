<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema\Operations\Search\Code\Response\ApplicationJson\Ok;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;

final class Search
{
    public function __construct(private Internal\Operators $operators)
    {
    }

    public function code(string $q, string $sort, string $order, int $perPage, int $page): Ok|WithoutBody
    {
        return $this->operators->search👷Code()->call($q, $sort, $order, $perPage, $page);
    }

    public function commits(string $q, string $sort, string $order, int $perPage, int $page): \ApiClients\Client\GitHubEnterprise\Schema\Operations\Search\Commits\Response\ApplicationJson\Ok|WithoutBody
    {
        return $this->operators->search👷Commits()->call($q, $sort, $order, $perPage, $page);
    }

    public function issuesAndPullRequests(string $q, string $sort, string $order, int $perPage, int $page): \ApiClients\Client\GitHubEnterprise\Schema\Operations\Search\IssuesAndPullRequests\Response\ApplicationJson\Ok|WithoutBody
    {
        return $this->operators->search👷IssuesAndPullRequests()->call($q, $sort, $order, $perPage, $page);
    }

    public function labels(int $repositoryId, string $q, string $sort, string $order, int $perPage, int $page): \ApiClients\Client\GitHubEnterprise\Schema\Operations\Search\Labels\Response\ApplicationJson\Ok|WithoutBody
    {
        return $this->operators->search👷Labels()->call($repositoryId, $q, $sort, $order, $perPage, $page);
    }

    public function repos(string $q, string $sort, string $order, int $perPage, int $page): \ApiClients\Client\GitHubEnterprise\Schema\Operations\Search\Repos\Response\ApplicationJson\Ok|WithoutBody
    {
        return $this->operators->search👷Repos()->call($q, $sort, $order, $perPage, $page);
    }

    public function topics(string $q, int $perPage, int $page): \ApiClients\Client\GitHubEnterprise\Schema\Operations\Search\Topics\Response\ApplicationJson\Ok|WithoutBody
    {
        return $this->operators->search👷Topics()->call($q, $perPage, $page);
    }

    public function users(string $q, string $sort, string $order, int $perPage, int $page): \ApiClients\Client\GitHubEnterprise\Schema\Operations\Search\Users\Response\ApplicationJson\Ok|WithoutBody
    {
        return $this->operators->search👷Users()->call($q, $sort, $order, $perPage, $page);
    }
}
