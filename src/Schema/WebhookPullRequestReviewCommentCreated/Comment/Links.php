<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\WebhookPullRequestReviewCommentCreated\Comment;

use ApiClients\Client\GitHubEnterprise\Schema;
use EventSauce\ObjectHydrator\MapFrom;

final readonly class Links
{
    public const SCHEMA_JSON         = '{"required":["self","html","pull_request"],"type":"object","properties":{"html":{"title":"Link","required":["href"],"type":"object","properties":{"href":{"type":"string","format":"uri-template"}}},"pull_request":{"title":"Link","required":["href"],"type":"object","properties":{"href":{"type":"string","format":"uri-template"}}},"self":{"title":"Link","required":["href"],"type":"object","properties":{"href":{"type":"string","format":"uri-template"}}}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"html":{"href":"generated"},"pull_request":{"href":"generated"},"self":{"href":"generated"}}';

    public function __construct(public Schema\WebhookPullRequestAssigned\PullRequest\Links\Comments $html, #[MapFrom('pull_request')] public Schema\WebhookPullRequestAssigned\PullRequest\Links\Comments $pullRequest, public Schema\WebhookPullRequestAssigned\PullRequest\Links\Comments $self)
    {
    }
}
