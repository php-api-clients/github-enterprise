<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Schema\WebhookPackagePublished\Package\PackageVersion;

use ApiClients\Client\GitHubEnterprise\Schema;
use EventSauce\ObjectHydrator\MapFrom;

final readonly class NpmMetadata
{
    public const SCHEMA_JSON         = '{"type":["object","null"],"properties":{"name":{"type":"string"},"version":{"type":"string"},"npm_user":{"type":"string"},"author":{"type":["object","null"]},"bugs":{"type":["object","null"]},"dependencies":{"type":"object"},"dev_dependencies":{"type":"object"},"peer_dependencies":{"type":"object"},"optional_dependencies":{"type":"object"},"description":{"type":"string"},"dist":{"type":["object","null"]},"git_head":{"type":"string"},"homepage":{"type":"string"},"license":{"type":"string"},"main":{"type":"string"},"repository":{"type":["object","null"]},"scripts":{"type":"object"},"id":{"type":"string"},"node_version":{"type":"string"},"npm_version":{"type":"string"},"has_shrinkwrap":{"type":"boolean"},"maintainers":{"type":"array","items":{"type":"object"}},"contributors":{"type":"array","items":{"type":"object"}},"engines":{"type":"object"},"keywords":{"type":"array","items":{"type":"string"}},"files":{"type":"array","items":{"type":"string"}},"bin":{"type":"object"},"man":{"type":"object"},"directories":{"type":["object","null"]},"os":{"type":"array","items":{"type":"string"}},"cpu":{"type":"array","items":{"type":"string"}},"readme":{"type":"string"},"installation_command":{"type":"string"},"release_id":{"type":"integer"},"commit_oid":{"type":"string"},"published_via_actions":{"type":"boolean"},"deleted_by_id":{"type":"integer"}}}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{"name":"generated","version":"generated","npm_user":"generated","author":[],"bugs":[],"dependencies":[],"dev_dependencies":[],"peer_dependencies":[],"optional_dependencies":[],"description":"generated","dist":[],"git_head":"generated","homepage":"generated","license":"generated","main":"generated","repository":[],"scripts":[],"id":"generated","node_version":"generated","npm_version":"generated","has_shrinkwrap":false,"maintainers":[[],[]],"contributors":[[],[]],"engines":[],"keywords":["generated","generated"],"files":["generated","generated"],"bin":[],"man":[],"directories":[],"os":["generated","generated"],"cpu":["generated","generated"],"readme":"generated","installation_command":"generated","release_id":10,"commit_oid":"generated","published_via_actions":false,"deleted_by_id":13}';

    public function __construct(public ?string $name, public ?string $version, #[MapFrom('npm_user')] public ?string $npmUser, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Author $author, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Bugs $bugs, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Dependencies $dependencies, #[MapFrom('dev_dependencies')] public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\DevDependencies $devDependencies, #[MapFrom('peer_dependencies')] public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\PeerDependencies $peerDependencies, #[MapFrom('optional_dependencies')] public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\OptionalDependencies $optionalDependencies, public ?string $description, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Dist $dist, #[MapFrom('git_head')] public ?string $gitHead, public ?string $homepage, public ?string $license, public ?string $main, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Repository $repository, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Scripts $scripts, public ?string $id, #[MapFrom('node_version')] public ?string $nodeVersion, #[MapFrom('npm_version')] public ?string $npmVersion, #[MapFrom('has_shrinkwrap')] public ?bool $hasShrinkwrap, public ?array $maintainers, public ?array $contributors, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Engines $engines, public ?array $keywords, public ?array $files, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Bin $bin, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Man $man, public ?Schema\WebhookPackagePublished\Package\PackageVersion\NpmMetadata\Directories $directories, public ?array $os, public ?array $cpu, public ?string $readme, #[MapFrom('installation_command')] public ?string $installationCommand, #[MapFrom('release_id')] public ?int $releaseId, #[MapFrom('commit_oid')] public ?string $commitOid, #[MapFrom('published_via_actions')] public ?bool $publishedViaActions, #[MapFrom('deleted_by_id')] public ?int $deletedById)
    {
    }
}
