<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\Repos\UpdatePullRequestReviewProtection\Request;

use ApiClients\Client\GitHubEnterprise\Schema;
use EventSauce\ObjectHydrator\MapFrom;

final readonly class ApplicationJson
{
    public const SCHEMA_JSON         = '{"type":"object","properties":{"dismissal_restrictions":{"type":"object","properties":{"users":{"type":"array","items":{"type":"string"},"description":"The list of user `login`s with dismissal access"},"teams":{"type":"array","items":{"type":"string"},"description":"The list of team `slug`s with dismissal access"},"apps":{"type":"array","items":{"type":"string"},"description":"The list of app `slug`s with dismissal access"}},"description":"Specify which users, teams, and apps can dismiss pull request reviews. Pass an empty `dismissal_restrictions` object to disable. User and team `dismissal_restrictions` are only available for organization-owned repositories. Omit this parameter for personal repositories."},"dismiss_stale_reviews":{"type":"boolean","description":"Set to `true` if you want to automatically dismiss approving reviews when someone pushes a new commit."},"require_code_owner_reviews":{"type":"boolean","description":"Blocks merging pull requests until [code owners](https:\\/\\/docs.github.com\\/enterprise-server@3.5\\/articles\\/about-code-owners\\/) have reviewed."},"required_approving_review_count":{"type":"integer","description":"Specifies the number of reviewers required to approve pull requests. Use a number between 1 and 6 or 0 to not require reviewers."},"bypass_pull_request_allowances":{"type":"object","properties":{"users":{"type":"array","items":{"type":"string"},"description":"The list of user `login`s allowed to bypass pull request requirements."},"teams":{"type":"array","items":{"type":"string"},"description":"The list of team `slug`s allowed to bypass pull request requirements."},"apps":{"type":"array","items":{"type":"string"},"description":"The list of app `slug`s allowed to bypass pull request requirements."}},"description":"Allow specific users, teams, or apps to bypass pull request requirements."}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"dismissal_restrictions":{"users":["generated","generated"],"teams":["generated","generated"],"apps":["generated","generated"]},"dismiss_stale_reviews":false,"require_code_owner_reviews":false,"required_approving_review_count":31,"bypass_pull_request_allowances":{"users":["generated","generated"],"teams":["generated","generated"],"apps":["generated","generated"]}}';

    /**
     * dismissalRestrictions: Specify which users, teams, and apps can dismiss pull request reviews. Pass an empty `dismissal_restrictions` object to disable. User and team `dismissal_restrictions` are only available for organization-owned repositories. Omit this parameter for personal repositories.
     * dismissStaleReviews: Set to `true` if you want to automatically dismiss approving reviews when someone pushes a new commit.
     * requireCodeOwnerReviews: Blocks merging pull requests until [code owners](https://docs.github.com/enterprise-server@3.5/articles/about-code-owners/) have reviewed.
     * requiredApprovingReviewCount: Specifies the number of reviewers required to approve pull requests. Use a number between 1 and 6 or 0 to not require reviewers.
     * bypassPullRequestAllowances: Allow specific users, teams, or apps to bypass pull request requirements.
     */
    public function __construct(#[MapFrom('dismissal_restrictions')] public ?Schema\Repos\UpdatePullRequestReviewProtection\Request\ApplicationJson\DismissalRestrictions $dismissalRestrictions, #[MapFrom('dismiss_stale_reviews')] public ?bool $dismissStaleReviews, #[MapFrom('require_code_owner_reviews')] public ?bool $requireCodeOwnerReviews, #[MapFrom('required_approving_review_count')] public ?int $requiredApprovingReviewCount, #[MapFrom('bypass_pull_request_allowances')] public ?Schema\Repos\UpdatePullRequestReviewProtection\Request\ApplicationJson\BypassPullRequestAllowances $bypassPullRequestAllowances)
    {
    }
}
