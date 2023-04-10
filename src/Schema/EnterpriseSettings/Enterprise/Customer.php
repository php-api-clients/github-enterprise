<?php

declare (strict_types=1);
namespace ApiClients\Client\Github\Schema\EnterpriseSettings\Enterprise;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
final readonly class Customer
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"name":{"type":"string"},"email":{"type":"string"},"uuid":{"type":"string"},"secret_key_data":{"type":"string"},"public_key_data":{"type":"string"}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"name":"generated_name_null","email":"generated_email_null","uuid":"generated_uuid_null","secret_key_data":"generated_secret_key_data_null","public_key_data":"generated_public_key_data_null"}';
    public function __construct(public ?string $name, public ?string $email, public ?string $uuid, #[\EventSauce\ObjectHydrator\MapFrom('secret_key_data')] public ?string $secretKeyData, #[\EventSauce\ObjectHydrator\MapFrom('public_key_data')] public ?string $publicKeyData)
    {
    }
}
