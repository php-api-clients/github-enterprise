<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\Package;
use ApiClients\Client\GitHubEnterprise\Schema\PackageVersion;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;

final class Packages
{
    public function __construct(private Internal\Operators $operators)
    {
    }

    /** @return iterable<int,Schema\Package> */
    public function listDockerMigrationConflictingPackagesForOrganization(string $org): iterable
    {
        return $this->operators->packages👷ListDockerMigrationConflictingPackagesForOrganization()->call($org);
    }

    /** @return iterable<int,Schema\Package>|WithoutBody */
    public function listPackagesForOrganization(string $packageType, string $org, string $visibility, int $page, int $perPage): iterable|WithoutBody
    {
        return $this->operators->packages👷ListPackagesForOrganization()->call($packageType, $org, $visibility, $page, $perPage);
    }

    /** @return iterable<int,Schema\Package>|WithoutBody */
    public function listPackagesForOrganizationListing(string $packageType, string $org, string $visibility, int $page, int $perPage): iterable|WithoutBody
    {
        return $this->operators->packages👷ListPackagesForOrganizationListing()->call($packageType, $org, $visibility, $page, $perPage);
    }

    public function getPackageForOrganization(string $packageType, string $packageName, string $org): Package
    {
        return $this->operators->packages👷GetPackageForOrganization()->call($packageType, $packageName, $org);
    }

    public function deletePackageForOrg(string $packageType, string $packageName, string $org): WithoutBody
    {
        return $this->operators->packages👷DeletePackageForOrg()->call($packageType, $packageName, $org);
    }

    public function restorePackageForOrg(string $packageType, string $packageName, string $org, string $token): WithoutBody
    {
        return $this->operators->packages👷RestorePackageForOrg()->call($packageType, $packageName, $org, $token);
    }

    /** @return iterable<int,Schema\PackageVersion> */
    public function getAllPackageVersionsForPackageOwnedByOrg(string $packageType, string $packageName, string $org, int $page, int $perPage, string $state): iterable
    {
        return $this->operators->packages👷GetAllPackageVersionsForPackageOwnedByOrg()->call($packageType, $packageName, $org, $page, $perPage, $state);
    }

    /** @return iterable<int,Schema\PackageVersion> */
    public function getAllPackageVersionsForPackageOwnedByOrgListing(string $packageType, string $packageName, string $org, int $page, int $perPage, string $state): iterable
    {
        return $this->operators->packages👷GetAllPackageVersionsForPackageOwnedByOrgListing()->call($packageType, $packageName, $org, $page, $perPage, $state);
    }

    public function getPackageVersionForOrganization(string $packageType, string $packageName, string $org, int $packageVersionId): PackageVersion
    {
        return $this->operators->packages👷GetPackageVersionForOrganization()->call($packageType, $packageName, $org, $packageVersionId);
    }

    public function deletePackageVersionForOrg(string $packageType, string $packageName, string $org, int $packageVersionId): WithoutBody
    {
        return $this->operators->packages👷DeletePackageVersionForOrg()->call($packageType, $packageName, $org, $packageVersionId);
    }

    public function restorePackageVersionForOrg(string $packageType, string $packageName, string $org, int $packageVersionId): WithoutBody
    {
        return $this->operators->packages👷RestorePackageVersionForOrg()->call($packageType, $packageName, $org, $packageVersionId);
    }

    /** @return iterable<int,Schema\Package> */
    public function listDockerMigrationConflictingPackagesForAuthenticatedUser(): iterable
    {
        return $this->operators->packages👷ListDockerMigrationConflictingPackagesForAuthenticatedUser()->call();
    }

    /** @return iterable<int,Schema\Package>|WithoutBody */
    public function listPackagesForAuthenticatedUser(string $packageType, string $visibility, int $page, int $perPage): iterable|WithoutBody
    {
        return $this->operators->packages👷ListPackagesForAuthenticatedUser()->call($packageType, $visibility, $page, $perPage);
    }

    /** @return iterable<int,Schema\Package>|WithoutBody */
    public function listPackagesForAuthenticatedUserListing(string $packageType, string $visibility, int $page, int $perPage): iterable|WithoutBody
    {
        return $this->operators->packages👷ListPackagesForAuthenticatedUserListing()->call($packageType, $visibility, $page, $perPage);
    }

    public function getPackageForAuthenticatedUser(string $packageType, string $packageName): Package
    {
        return $this->operators->packages👷GetPackageForAuthenticatedUser()->call($packageType, $packageName);
    }

    public function deletePackageForAuthenticatedUser(string $packageType, string $packageName): WithoutBody
    {
        return $this->operators->packages👷DeletePackageForAuthenticatedUser()->call($packageType, $packageName);
    }

    public function restorePackageForAuthenticatedUser(string $packageType, string $packageName, string $token): WithoutBody
    {
        return $this->operators->packages👷RestorePackageForAuthenticatedUser()->call($packageType, $packageName, $token);
    }

    /** @return iterable<int,Schema\PackageVersion> */
    public function getAllPackageVersionsForPackageOwnedByAuthenticatedUser(string $packageType, string $packageName, int $page, int $perPage, string $state): iterable
    {
        return $this->operators->packages👷GetAllPackageVersionsForPackageOwnedByAuthenticatedUser()->call($packageType, $packageName, $page, $perPage, $state);
    }

    /** @return iterable<int,Schema\PackageVersion> */
    public function getAllPackageVersionsForPackageOwnedByAuthenticatedUserListing(string $packageType, string $packageName, int $page, int $perPage, string $state): iterable
    {
        return $this->operators->packages👷GetAllPackageVersionsForPackageOwnedByAuthenticatedUserListing()->call($packageType, $packageName, $page, $perPage, $state);
    }

    public function getPackageVersionForAuthenticatedUser(string $packageType, string $packageName, int $packageVersionId): PackageVersion
    {
        return $this->operators->packages👷GetPackageVersionForAuthenticatedUser()->call($packageType, $packageName, $packageVersionId);
    }

    public function deletePackageVersionForAuthenticatedUser(string $packageType, string $packageName, int $packageVersionId): WithoutBody
    {
        return $this->operators->packages👷DeletePackageVersionForAuthenticatedUser()->call($packageType, $packageName, $packageVersionId);
    }

    public function restorePackageVersionForAuthenticatedUser(string $packageType, string $packageName, int $packageVersionId): WithoutBody
    {
        return $this->operators->packages👷RestorePackageVersionForAuthenticatedUser()->call($packageType, $packageName, $packageVersionId);
    }

    /** @return iterable<int,Schema\Package> */
    public function listDockerMigrationConflictingPackagesForUser(string $username): iterable
    {
        return $this->operators->packages👷ListDockerMigrationConflictingPackagesForUser()->call($username);
    }

    /** @return iterable<int,Schema\Package>|WithoutBody */
    public function listPackagesForUser(string $packageType, string $visibility, string $username, int $page, int $perPage): iterable|WithoutBody
    {
        return $this->operators->packages👷ListPackagesForUser()->call($packageType, $visibility, $username, $page, $perPage);
    }

    /** @return iterable<int,Schema\Package>|WithoutBody */
    public function listPackagesForUserListing(string $packageType, string $visibility, string $username, int $page, int $perPage): iterable|WithoutBody
    {
        return $this->operators->packages👷ListPackagesForUserListing()->call($packageType, $visibility, $username, $page, $perPage);
    }

    public function getPackageForUser(string $packageType, string $packageName, string $username): Package
    {
        return $this->operators->packages👷GetPackageForUser()->call($packageType, $packageName, $username);
    }

    public function deletePackageForUser(string $packageType, string $packageName, string $username): WithoutBody
    {
        return $this->operators->packages👷DeletePackageForUser()->call($packageType, $packageName, $username);
    }

    public function restorePackageForUser(string $packageType, string $packageName, string $username, string $token): WithoutBody
    {
        return $this->operators->packages👷RestorePackageForUser()->call($packageType, $packageName, $username, $token);
    }

    /** @return iterable<int,Schema\PackageVersion> */
    public function getAllPackageVersionsForPackageOwnedByUser(string $packageType, string $packageName, string $username): iterable
    {
        return $this->operators->packages👷GetAllPackageVersionsForPackageOwnedByUser()->call($packageType, $packageName, $username);
    }

    public function getPackageVersionForUser(string $packageType, string $packageName, int $packageVersionId, string $username): PackageVersion
    {
        return $this->operators->packages👷GetPackageVersionForUser()->call($packageType, $packageName, $packageVersionId, $username);
    }

    public function deletePackageVersionForUser(string $packageType, string $packageName, string $username, int $packageVersionId): WithoutBody
    {
        return $this->operators->packages👷DeletePackageVersionForUser()->call($packageType, $packageName, $username, $packageVersionId);
    }

    public function restorePackageVersionForUser(string $packageType, string $packageName, string $username, int $packageVersionId): WithoutBody
    {
        return $this->operators->packages👷RestorePackageVersionForUser()->call($packageType, $packageName, $username, $packageVersionId);
    }
}
