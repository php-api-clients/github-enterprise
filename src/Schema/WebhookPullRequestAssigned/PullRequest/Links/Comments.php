<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\WebhookPullRequestAssigned\PullRequest\Links;

final readonly class Comments
{
    public const SCHEMA_JSON         = '{"title":"Link","required":["href"],"type":"object","properties":{"href":{"type":"string","format":"uri-template"}}}';
    public const SCHEMA_TITLE        = 'Link';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"href":"generated"}';

    public function __construct(public string $href)
    {
    }
}
