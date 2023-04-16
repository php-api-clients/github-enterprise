<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Schema\EnterpriseAdmin\CreateSelfHostedRunnerGroupForEnterprise\Request;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"required":["name"],"type":"object","properties":{"name":{"type":"string","description":"Name of the runner group."},"visibility":{"enum":["selected","all"],"type":"string","description":"Visibility of a runner group. You can select all organizations or select individual organization."},"selected_organization_ids":{"type":"array","items":{"type":"integer","description":"Unique identifier of the organization."},"description":"List of organization IDs that can access the runner group."},"runners":{"type":"array","items":{"type":"integer","description":"Unique identifier of the runner."},"description":"List of runner IDs to add to the runner group."},"allows_public_repositories":{"type":"boolean","description":"Whether the runner group can be used by `public` repositories.","default":false},"restricted_to_workflows":{"type":"boolean","description":"If `true`, the runner group will be restricted to running only the workflows specified in the `selected_workflows` array.","default":false},"selected_workflows":{"type":"array","items":{"type":"string","description":"Name of workflow the runner group should be allowed to run. Note that a ref, tag, or long SHA is required.","examples":["octo-org\\/octo-repo\\/.github\\/workflows\\/deploy.yaml@main"]},"description":"List of workflows the runner group should be allowed to run. This setting will be ignored unless `restricted_to_workflows` is set to `true`."}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"name":"generated_name_null","visibility":"selected","selected_organization_ids":[13],"runners":[13],"allows_public_repositories":false,"restricted_to_workflows":false,"selected_workflows":["generated_selected_workflows_null"]}';
    /**
     * name: Name of the runner group.
     * visibility: Visibility of a runner group. You can select all organizations or select individual organization.
     * selectedOrganizationIds: List of organization IDs that can access the runner group.
     * @param ?array<int> $selectedOrganizationIds
     * runners: List of runner IDs to add to the runner group.
     * @param ?array<int> $runners
     * allowsPublicRepositories: Whether the runner group can be used by `public` repositories.
     * restrictedToWorkflows: If `true`, the runner group will be restricted to running only the workflows specified in the `selected_workflows` array.
     * selectedWorkflows: List of workflows the runner group should be allowed to run. This setting will be ignored unless `restricted_to_workflows` is set to `true`.
     * @param ?array<string> $selectedWorkflows
     */
    public function __construct(public string $name, public ?string $visibility, #[\EventSauce\ObjectHydrator\MapFrom('selected_organization_ids')] public ?array $selectedOrganizationIds, public ?array $runners, #[\EventSauce\ObjectHydrator\MapFrom('allows_public_repositories')] public ?bool $allowsPublicRepositories, #[\EventSauce\ObjectHydrator\MapFrom('restricted_to_workflows')] public ?bool $restrictedToWorkflows, #[\EventSauce\ObjectHydrator\MapFrom('selected_workflows')] public ?array $selectedWorkflows)
    {
    }
}
