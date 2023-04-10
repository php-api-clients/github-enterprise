<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final readonly class BranchRestrictionPolicy
{
    public const SCHEMA_JSON = '{"title":"Branch Restriction Policy","required":["url","users_url","teams_url","apps_url","users","teams","apps"],"type":"object","properties":{"url":{"type":"string","format":"uri"},"users_url":{"type":"string","format":"uri"},"teams_url":{"type":"string","format":"uri"},"apps_url":{"type":"string","format":"uri"},"users":{"type":"array","items":{"type":"object","properties":{"login":{"type":"string"},"id":{"type":"integer"},"node_id":{"type":"string"},"avatar_url":{"type":"string"},"gravatar_id":{"type":"string"},"url":{"type":"string"},"html_url":{"type":"string"},"followers_url":{"type":"string"},"following_url":{"type":"string"},"gists_url":{"type":"string"},"starred_url":{"type":"string"},"subscriptions_url":{"type":"string"},"organizations_url":{"type":"string"},"repos_url":{"type":"string"},"events_url":{"type":"string"},"received_events_url":{"type":"string"},"type":{"type":"string"},"site_admin":{"type":"boolean"}}}},"teams":{"type":"array","items":{"type":"object","properties":{"id":{"type":"integer"},"node_id":{"type":"string"},"url":{"type":"string"},"html_url":{"type":"string"},"name":{"type":"string"},"slug":{"type":"string"},"description":{"type":["string","null"]},"privacy":{"type":"string"},"notification_setting":{"type":"string"},"permission":{"type":"string"},"members_url":{"type":"string"},"repositories_url":{"type":"string"},"parent":{"type":["string","null"]}}}},"apps":{"type":"array","items":{"type":"object","properties":{"id":{"type":"integer"},"slug":{"type":"string"},"node_id":{"type":"string"},"owner":{"type":"object","properties":{"login":{"type":"string"},"id":{"type":"integer"},"node_id":{"type":"string"},"url":{"type":"string"},"repos_url":{"type":"string"},"events_url":{"type":"string"},"hooks_url":{"type":"string"},"issues_url":{"type":"string"},"members_url":{"type":"string"},"public_members_url":{"type":"string"},"avatar_url":{"type":"string"},"description":{"type":"string"},"gravatar_id":{"type":"string","examples":["\\"\\""]},"html_url":{"type":"string","examples":["\\"https:\\/\\/github.com\\/testorg-ea8ec76d71c3af4b\\""]},"followers_url":{"type":"string","examples":["\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/followers\\""]},"following_url":{"type":"string","examples":["\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/following{\\/other_user}\\""]},"gists_url":{"type":"string","examples":["\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/gists{\\/gist_id}\\""]},"starred_url":{"type":"string","examples":["\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/starred{\\/owner}{\\/repo}\\""]},"subscriptions_url":{"type":"string","examples":["\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/subscriptions\\""]},"organizations_url":{"type":"string","examples":["\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/orgs\\""]},"received_events_url":{"type":"string","examples":["\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/received_events\\""]},"type":{"type":"string","examples":["\\"Organization\\""]},"site_admin":{"type":"boolean","examples":[false]}}},"name":{"type":"string"},"description":{"type":"string"},"external_url":{"type":"string"},"html_url":{"type":"string"},"created_at":{"type":"string"},"updated_at":{"type":"string"},"permissions":{"type":"object","properties":{"metadata":{"type":"string"},"contents":{"type":"string"},"issues":{"type":"string"},"single_file":{"type":"string"}}},"events":{"type":"array","items":{"type":"string"}}}}}},"description":"Branch Restriction Policy"}';
    public const SCHEMA_TITLE = 'Branch Restriction Policy';
    public const SCHEMA_DESCRIPTION = 'Branch Restriction Policy';
    public const SCHEMA_EXAMPLE_DATA = '{"url":"https:\\/\\/example.com\\/","users_url":"https:\\/\\/example.com\\/","teams_url":"https:\\/\\/example.com\\/","apps_url":"https:\\/\\/example.com\\/","users":[{"login":"generated_login_null","id":13,"node_id":"generated_node_id_null","avatar_url":"generated_avatar_url_null","gravatar_id":"generated_gravatar_id_null","url":"generated_url_null","html_url":"generated_html_url_null","followers_url":"generated_followers_url_null","following_url":"generated_following_url_null","gists_url":"generated_gists_url_null","starred_url":"generated_starred_url_null","subscriptions_url":"generated_subscriptions_url_null","organizations_url":"generated_organizations_url_null","repos_url":"generated_repos_url_null","events_url":"generated_events_url_null","received_events_url":"generated_received_events_url_null","type":"generated_type_null","site_admin":false}],"teams":[{"id":13,"node_id":"generated_node_id_null","url":"generated_url_null","html_url":"generated_html_url_null","name":"generated_name_null","slug":"generated_slug_null","description":"generated_description_null","privacy":"generated_privacy_null","notification_setting":"generated_notification_setting_null","permission":"generated_permission_null","members_url":"generated_members_url_null","repositories_url":"generated_repositories_url_null","parent":"generated_parent_null"}],"apps":[{"id":13,"slug":"generated_slug_null","node_id":"generated_node_id_null","owner":{"login":"generated_login_null","id":13,"node_id":"generated_node_id_null","url":"generated_url_null","repos_url":"generated_repos_url_null","events_url":"generated_events_url_null","hooks_url":"generated_hooks_url_null","issues_url":"generated_issues_url_null","members_url":"generated_members_url_null","public_members_url":"generated_public_members_url_null","avatar_url":"generated_avatar_url_null","description":"generated_description_null","gravatar_id":"\\"\\"","html_url":"\\"https:\\/\\/github.com\\/testorg-ea8ec76d71c3af4b\\"","followers_url":"\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/followers\\"","following_url":"\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/following{\\/other_user}\\"","gists_url":"\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/gists{\\/gist_id}\\"","starred_url":"\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/starred{\\/owner}{\\/repo}\\"","subscriptions_url":"\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/subscriptions\\"","organizations_url":"\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/orgs\\"","received_events_url":"\\"https:\\/\\/api.github.com\\/users\\/testorg-ea8ec76d71c3af4b\\/received_events\\"","type":"\\"Organization\\"","site_admin":false},"name":"generated_name_null","description":"generated_description_null","external_url":"generated_external_url_null","html_url":"generated_html_url_null","created_at":"generated_created_at_null","updated_at":"generated_updated_at_null","permissions":{"metadata":"generated_metadata_null","contents":"generated_contents_null","issues":"generated_issues_null","single_file":"generated_single_file_null"},"events":["generated_events_null"]}]}';
    /**
     * @param array<\ApiClients\Client\GitHubEnterprise\Schema\BranchRestrictionPolicy\Users> $users
     * @param array<\ApiClients\Client\GitHubEnterprise\Schema\BranchRestrictionPolicy\Teams> $teams
     * @param array<\ApiClients\Client\GitHubEnterprise\Schema\BranchRestrictionPolicy\Apps> $apps
     */
    public function __construct(public string $url, #[\EventSauce\ObjectHydrator\MapFrom('users_url')] public string $usersUrl, #[\EventSauce\ObjectHydrator\MapFrom('teams_url')] public string $teamsUrl, #[\EventSauce\ObjectHydrator\MapFrom('apps_url')] public string $appsUrl, #[\EventSauce\ObjectHydrator\PropertyCasters\CastListToType(Schema\BranchRestrictionPolicy\Users::class)] public array $users, #[\EventSauce\ObjectHydrator\PropertyCasters\CastListToType(Schema\BranchRestrictionPolicy\Teams::class)] public array $teams, #[\EventSauce\ObjectHydrator\PropertyCasters\CastListToType(Schema\BranchRestrictionPolicy\Apps::class)] public array $apps)
    {
    }
}
