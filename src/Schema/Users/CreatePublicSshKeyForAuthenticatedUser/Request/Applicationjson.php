<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema\Users\CreatePublicSshKeyForAuthenticatedUser\Request;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"required":["key"],"type":"object","properties":{"title":{"type":"string","description":"A descriptive name for the new key.","examples":["Personal MacBook Air"]},"key":{"pattern":"^ssh-(rsa|dss|ed25519) |^ecdsa-sha2-nistp(256|384|521) ","type":"string","description":"The public SSH key to add to your GitHub account."}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"title":"Personal MacBook Air","key":"generated_key_null"}';
    /**
     * title: A descriptive name for the new key.
     * key: The public SSH key to add to your GitHub account.
     */
    public function __construct(public ?string $title, public string $key)
    {
    }
}
