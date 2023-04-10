<?php

declare (strict_types=1);
namespace ApiClients\Client\Github\Schema\AuditLogEvent;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
final readonly class ActorLocation
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"country_name":{"type":"string"}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"country_name":"generated_country_name_null"}';
    public function __construct(#[\EventSauce\ObjectHydrator\MapFrom('country_name')] public ?string $countryName)
    {
    }
}
