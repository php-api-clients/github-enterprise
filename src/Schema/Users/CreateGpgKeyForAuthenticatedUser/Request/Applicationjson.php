<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema\Users\CreateGpgKeyForAuthenticatedUser\Request;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"required":["armored_public_key"],"type":"object","properties":{"name":{"type":"string","description":"A descriptive name for the new key."},"armored_public_key":{"type":"string","description":"A GPG key in ASCII-armored format."}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"name":"generated_name_null","armored_public_key":"generated_armored_public_key_null"}';
    /**
     * name: A descriptive name for the new key.
     * armoredPublicKey: A GPG key in ASCII-armored format.
     */
    public function __construct(public ?string $name, #[\EventSauce\ObjectHydrator\MapFrom('armored_public_key')] public string $armoredPublicKey)
    {
    }
}
