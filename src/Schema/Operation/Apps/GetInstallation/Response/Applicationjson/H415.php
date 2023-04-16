<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\Operation\Apps\GetInstallation\Response\Applicationjson;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class H415
{
    public const SCHEMA_JSON         = '{"required":["message","documentation_url"],"type":"object","properties":{"message":{"type":"string"},"documentation_url":{"type":"string"}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"message":"generated_message_null","documentation_url":"generated_documentation_url_null"}';

    public function __construct(public string $message, #[MapFrom('documentation_url')] public string $documentationUrl)
    {
    }
}
