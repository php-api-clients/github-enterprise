<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema;

use ApiClients\Client\GitHubEnterprise\Schema;
use EventSauce\ObjectHydrator\MapFrom;
use EventSauce\ObjectHydrator\PropertyCasters\CastListToType;

final readonly class UserSearchResultItem
{
    public const SCHEMA_JSON         = '{"title":"User Search Result Item","required":["avatar_url","events_url","followers_url","following_url","gists_url","gravatar_id","html_url","id","node_id","login","organizations_url","received_events_url","repos_url","site_admin","starred_url","subscriptions_url","type","url","score"],"type":"object","properties":{"login":{"type":"string"},"id":{"type":"integer"},"node_id":{"type":"string"},"avatar_url":{"type":"string","format":"uri"},"gravatar_id":{"type":["string","null"]},"url":{"type":"string","format":"uri"},"html_url":{"type":"string","format":"uri"},"followers_url":{"type":"string","format":"uri"},"subscriptions_url":{"type":"string","format":"uri"},"organizations_url":{"type":"string","format":"uri"},"repos_url":{"type":"string","format":"uri"},"received_events_url":{"type":"string","format":"uri"},"type":{"type":"string"},"score":{"type":"number"},"following_url":{"type":"string"},"gists_url":{"type":"string"},"starred_url":{"type":"string"},"events_url":{"type":"string"},"public_repos":{"type":"integer"},"public_gists":{"type":"integer"},"followers":{"type":"integer"},"following":{"type":"integer"},"created_at":{"type":"string","format":"date-time"},"updated_at":{"type":"string","format":"date-time"},"name":{"type":["string","null"]},"bio":{"type":["string","null"]},"email":{"type":["string","null"],"format":"email"},"location":{"type":["string","null"]},"site_admin":{"type":"boolean"},"hireable":{"type":["boolean","null"]},"text_matches":{"title":"Search Result Text Matches","type":"array","items":{"type":"object","properties":{"object_url":{"type":"string"},"object_type":{"type":["string","null"]},"property":{"type":"string"},"fragment":{"type":"string"},"matches":{"type":"array","items":{"type":"object","properties":{"text":{"type":"string"},"indices":{"type":"array","items":{"type":"integer"}}}}}}}},"blog":{"type":["string","null"]},"company":{"type":["string","null"]},"suspended_at":{"type":["string","null"],"format":"date-time"}},"description":"User Search Result Item"}';
    public const SCHEMA_TITLE        = 'User Search Result Item';
    public const SCHEMA_DESCRIPTION  = 'User Search Result Item';
    public const SCHEMA_EXAMPLE_DATA = '{"login":"generated_login_null","id":13,"node_id":"generated_node_id_null","avatar_url":"https:\\/\\/example.com\\/","gravatar_id":"generated_gravatar_id_null","url":"https:\\/\\/example.com\\/","html_url":"https:\\/\\/example.com\\/","followers_url":"https:\\/\\/example.com\\/","subscriptions_url":"https:\\/\\/example.com\\/","organizations_url":"https:\\/\\/example.com\\/","repos_url":"https:\\/\\/example.com\\/","received_events_url":"https:\\/\\/example.com\\/","type":"generated_type_null","score":13.13,"following_url":"generated_following_url_null","gists_url":"generated_gists_url_null","starred_url":"generated_starred_url_null","events_url":"generated_events_url_null","public_repos":13,"public_gists":13,"followers":13,"following":13,"created_at":"1970-01-01T00:00:00+00:00","updated_at":"1970-01-01T00:00:00+00:00","name":"generated_name_null","bio":"generated_bio_null","email":"generated_email_email","location":"generated_location_null","site_admin":false,"hireable":false,"text_matches":[{"object_url":"generated_object_url_null","object_type":"generated_object_type_null","property":"generated_property_null","fragment":"generated_fragment_null","matches":[{"text":"generated_text_null","indices":[13]}]}],"blog":"generated_blog_null","company":"generated_company_null","suspended_at":"1970-01-01T00:00:00+00:00"}';

    /**
     * @param ?array<SearchResultTextMatches> $textMatches
     */
    public function __construct(public string $login, public int $id, #[MapFrom('node_id')] public string $nodeId, #[MapFrom('avatar_url')] public string $avatarUrl, #[MapFrom('gravatar_id')] public ?string $gravatarId, public string $url, #[MapFrom('html_url')] public string $htmlUrl, #[MapFrom('followers_url')] public string $followersUrl, #[MapFrom('subscriptions_url')] public string $subscriptionsUrl, #[MapFrom('organizations_url')] public string $organizationsUrl, #[MapFrom('repos_url')] public string $reposUrl, #[MapFrom('received_events_url')] public string $receivedEventsUrl, public string $type, public int|float $score, #[MapFrom('following_url')] public string $followingUrl, #[MapFrom('gists_url')] public string $gistsUrl, #[MapFrom('starred_url')] public string $starredUrl, #[MapFrom('events_url')] public string $eventsUrl, #[MapFrom('public_repos')] public ?int $publicRepos, #[MapFrom('public_gists')] public ?int $publicGists, public ?int $followers, public ?int $following, #[MapFrom('created_at')] public ?string $createdAt, #[MapFrom('updated_at')] public ?string $updatedAt, public ?string $name, public ?string $bio, public ?string $email, public ?string $location, #[MapFrom('site_admin')] public bool $siteAdmin, public ?bool $hireable, #[MapFrom('text_matches')] #[CastListToType(Schema\SearchResultTextMatches::class)] public ?array $textMatches, public ?string $blog, public ?string $company, #[MapFrom('suspended_at')] public ?string $suspendedAt)
    {
    }
}
