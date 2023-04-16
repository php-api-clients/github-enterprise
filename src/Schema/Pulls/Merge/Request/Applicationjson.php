<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\Pulls\Merge\Request;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class Applicationjson
{
    public const SCHEMA_JSON         = '{"type":["object","null"],"properties":{"commit_title":{"type":"string","description":"Title for the automatic commit message."},"commit_message":{"type":"string","description":"Extra detail to append to automatic commit message."},"sha":{"type":"string","description":"SHA that pull request head must match to allow merge."},"merge_method":{"enum":["merge","squash","rebase"],"type":"string","description":"Merge method to use. Possible values are `merge`, `squash` or `rebase`. Default is `merge`."}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"commit_title":"generated_commit_title_null","commit_message":"generated_commit_message_null","sha":"generated_sha_null","merge_method":"merge"}';

    /**
     * commitTitle: Title for the automatic commit message.
     * commitMessage: Extra detail to append to automatic commit message.
     * sha: SHA that pull request head must match to allow merge.
     * mergeMethod: Merge method to use. Possible values are `merge`, `squash` or `rebase`. Default is `merge`.
     */
    public function __construct(#[MapFrom('commit_title')] public ?string $commitTitle, #[MapFrom('commit_message')] public ?string $commitMessage, public ?string $sha, #[MapFrom('merge_method')] public ?string $mergeMethod)
    {
    }
}
