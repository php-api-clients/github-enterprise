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
final readonly class CodeScanningAnalysisDeletion
{
    public const SCHEMA_JSON = '{"title":"Analysis deletion","required":["next_analysis_url","confirm_delete_url"],"type":"object","properties":{"next_analysis_url":{"type":["string","null"],"description":"Next deletable analysis in chain, without last analysis deletion confirmation","format":"uri","readOnly":true},"confirm_delete_url":{"type":["string","null"],"description":"Next deletable analysis in chain, with last analysis deletion confirmation","format":"uri","readOnly":true}},"description":"Successful deletion of a code scanning analysis"}';
    public const SCHEMA_TITLE = 'Analysis deletion';
    public const SCHEMA_DESCRIPTION = 'Successful deletion of a code scanning analysis';
    public const SCHEMA_EXAMPLE_DATA = '{"next_analysis_url":"https:\\/\\/example.com\\/","confirm_delete_url":"https:\\/\\/example.com\\/"}';
    /**
     * nextAnalysisUrl: Next deletable analysis in chain, without last analysis deletion confirmation
     * confirmDeleteUrl: Next deletable analysis in chain, with last analysis deletion confirmation
     */
    public function __construct(#[\EventSauce\ObjectHydrator\MapFrom('next_analysis_url')] public ?string $nextAnalysisUrl, #[\EventSauce\ObjectHydrator\MapFrom('confirm_delete_url')] public ?string $confirmDeleteUrl)
    {
    }
}
