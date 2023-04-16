<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final readonly class Actor
{
    public const SCHEMA_JSON = '{"title":"Actor","required":["id","login","gravatar_id","url","avatar_url"],"type":"object","properties":{"id":{"type":"integer"},"login":{"type":"string"},"display_login":{"type":"string"},"gravatar_id":{"type":["string","null"]},"url":{"type":"string","format":"uri"},"avatar_url":{"type":"string","format":"uri"}},"description":"Actor"}';
    public const SCHEMA_TITLE = 'Actor';
    public const SCHEMA_DESCRIPTION = 'Actor';
    public const SCHEMA_EXAMPLE_DATA = '{"id":13,"login":"generated_login_null","display_login":"generated_display_login_null","gravatar_id":"generated_gravatar_id_null","url":"https:\\/\\/example.com\\/","avatar_url":"https:\\/\\/example.com\\/"}';
    public function __construct(public int $id, public string $login, #[\EventSauce\ObjectHydrator\MapFrom('display_login')] public ?string $displayLogin, #[\EventSauce\ObjectHydrator\MapFrom('gravatar_id')] public ?string $gravatarId, public string $url, #[\EventSauce\ObjectHydrator\MapFrom('avatar_url')] public string $avatarUrl)
    {
    }
}
