<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Hydrator\Operation\Admin\Ldap\Users\Username;

use EventSauce\ObjectHydrator\IterableList;
use EventSauce\ObjectHydrator\ObjectMapper;
use EventSauce\ObjectHydrator\UnableToHydrateObject;
use EventSauce\ObjectHydrator\UnableToSerializeObject;
use Generator;

class Mapping implements ObjectMapper
{
    private array $hydrationStack = [];
    public function __construct() {}

    /**
     * @template T of object
     * @param class-string<T> $className
     * @return T
     */
    public function hydrateObject(string $className, array $payload): object
    {
        return match($className) {
            'ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser($payload),
                'ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser⚡️Plan($payload),
            default => throw UnableToHydrateObject::noHydrationDefined($className, $this->hydrationStack),
        };
    }
    
            
    private function hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser(array $payload): \ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['ldap_dn'] ?? null;

            if ($value === null) {
                $properties['ldapDn'] = null;
                goto after_ldapDn;
            }

            $properties['ldapDn'] = $value;

            after_ldapDn:

            $value = $payload['login'] ?? null;

            if ($value === null) {
                $missingFields[] = 'login';
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'avatar_url';
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'followers_url';
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'following_url';
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'gists_url';
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'starred_url';
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'subscriptions_url';
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'organizations_url';
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repos_url';
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events_url';
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'received_events_url';
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $missingFields[] = 'type';
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $missingFields[] = 'site_admin';
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['company'] ?? null;

            if ($value === null) {
                $properties['company'] = null;
                goto after_company;
            }

            $properties['company'] = $value;

            after_company:

            $value = $payload['blog'] ?? null;

            if ($value === null) {
                $properties['blog'] = null;
                goto after_blog;
            }

            $properties['blog'] = $value;

            after_blog:

            $value = $payload['location'] ?? null;

            if ($value === null) {
                $properties['location'] = null;
                goto after_location;
            }

            $properties['location'] = $value;

            after_location:

            $value = $payload['email'] ?? null;

            if ($value === null) {
                $properties['email'] = null;
                goto after_email;
            }

            $properties['email'] = $value;

            after_email:

            $value = $payload['hireable'] ?? null;

            if ($value === null) {
                $properties['hireable'] = null;
                goto after_hireable;
            }

            $properties['hireable'] = $value;

            after_hireable:

            $value = $payload['bio'] ?? null;

            if ($value === null) {
                $properties['bio'] = null;
                goto after_bio;
            }

            $properties['bio'] = $value;

            after_bio:

            $value = $payload['twitter_username'] ?? null;

            if ($value === null) {
                $properties['twitterUsername'] = null;
                goto after_twitterUsername;
            }

            $properties['twitterUsername'] = $value;

            after_twitterUsername:

            $value = $payload['public_repos'] ?? null;

            if ($value === null) {
                $missingFields[] = 'public_repos';
                goto after_publicRepos;
            }

            $properties['publicRepos'] = $value;

            after_publicRepos:

            $value = $payload['public_gists'] ?? null;

            if ($value === null) {
                $missingFields[] = 'public_gists';
                goto after_publicGists;
            }

            $properties['publicGists'] = $value;

            after_publicGists:

            $value = $payload['followers'] ?? null;

            if ($value === null) {
                $missingFields[] = 'followers';
                goto after_followers;
            }

            $properties['followers'] = $value;

            after_followers:

            $value = $payload['following'] ?? null;

            if ($value === null) {
                $missingFields[] = 'following';
                goto after_following;
            }

            $properties['following'] = $value;

            after_following:

            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'created_at';
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['updated_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'updated_at';
                goto after_updatedAt;
            }

            $properties['updatedAt'] = $value;

            after_updatedAt:

            $value = $payload['private_gists'] ?? null;

            if ($value === null) {
                $missingFields[] = 'private_gists';
                goto after_privateGists;
            }

            $properties['privateGists'] = $value;

            after_privateGists:

            $value = $payload['total_private_repos'] ?? null;

            if ($value === null) {
                $missingFields[] = 'total_private_repos';
                goto after_totalPrivateRepos;
            }

            $properties['totalPrivateRepos'] = $value;

            after_totalPrivateRepos:

            $value = $payload['owned_private_repos'] ?? null;

            if ($value === null) {
                $missingFields[] = 'owned_private_repos';
                goto after_ownedPrivateRepos;
            }

            $properties['ownedPrivateRepos'] = $value;

            after_ownedPrivateRepos:

            $value = $payload['disk_usage'] ?? null;

            if ($value === null) {
                $missingFields[] = 'disk_usage';
                goto after_diskUsage;
            }

            $properties['diskUsage'] = $value;

            after_diskUsage:

            $value = $payload['collaborators'] ?? null;

            if ($value === null) {
                $missingFields[] = 'collaborators';
                goto after_collaborators;
            }

            $properties['collaborators'] = $value;

            after_collaborators:

            $value = $payload['two_factor_authentication'] ?? null;

            if ($value === null) {
                $missingFields[] = 'two_factor_authentication';
                goto after_twoFactorAuthentication;
            }

            $properties['twoFactorAuthentication'] = $value;

            after_twoFactorAuthentication:

            $value = $payload['plan'] ?? null;

            if ($value === null) {
                $properties['plan'] = null;
                goto after_plan;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'plan';
                    $value = $this->hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser⚡️Plan($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['plan'] = $value;

            after_plan:

            $value = $payload['suspended_at'] ?? null;

            if ($value === null) {
                $properties['suspendedAt'] = null;
                goto after_suspendedAt;
            }

            $properties['suspendedAt'] = $value;

            after_suspendedAt:

            $value = $payload['business_plus'] ?? null;

            if ($value === null) {
                $properties['businessPlus'] = null;
                goto after_businessPlus;
            }

            $properties['businessPlus'] = $value;

            after_businessPlus:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser⚡️Plan(array $payload): \ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['collaborators'] ?? null;

            if ($value === null) {
                $missingFields[] = 'collaborators';
                goto after_collaborators;
            }

            $properties['collaborators'] = $value;

            after_collaborators:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['space'] ?? null;

            if ($value === null) {
                $missingFields[] = 'space';
                goto after_space;
            }

            $properties['space'] = $value;

            after_space:

            $value = $payload['private_repos'] ?? null;

            if ($value === null) {
                $missingFields[] = 'private_repos';
                goto after_privateRepos;
            }

            $properties['privateRepos'] = $value;

            after_privateRepos:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan', $exception, stack: $this->hydrationStack);
        }
    }
    
    private function serializeViaTypeMap(string $accessor, object $object, array $payloadToTypeMap): array
    {
        foreach ($payloadToTypeMap as $payloadType => [$valueType, $method]) {
            if (is_a($object, $valueType)) {
                return [$accessor => $payloadType] + $this->{$method}($object);
            }
        }

        throw new \LogicException('No type mapped for object of class: ' . get_class($object));
    }

    public function serializeObject(object $object): mixed
    {
        return $this->serializeObjectOfType($object, get_class($object));
    }

    /**
     * @template T
     *
     * @param T               $object
     * @param class-string<T> $className
     */
    public function serializeObjectOfType(object $object, string $className): mixed
    {
        try {
            return match($className) {
                'array' => $this->serializeValuearray($object),
            'Ramsey\Uuid\UuidInterface' => $this->serializeValueRamsey⚡️Uuid⚡️UuidInterface($object),
            'DateTime' => $this->serializeValueDateTime($object),
            'DateTimeImmutable' => $this->serializeValueDateTimeImmutable($object),
            'DateTimeInterface' => $this->serializeValueDateTimeInterface($object),
            'ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser($object),
            'ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser⚡️Plan($object),
                default => throw new \LogicException('No serialization defined for $className'),
            };
        } catch (\Throwable $exception) {
            throw UnableToSerializeObject::dueToError($className, $exception);
        }
    }
    
    
    private function serializeValuearray(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueRamsey⚡️Uuid⚡️UuidInterface(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeUuidToString(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTime(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTimeImmutable(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTimeInterface(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser);
        $result = [];

        $ldapDn = $object->ldapDn;

        if ($ldapDn === null) {
            goto after_ldapDn;
        }
        after_ldapDn:        $result['ldap_dn'] = $ldapDn;

        
        $login = $object->login;
        after_login:        $result['login'] = $login;

        
        $id = $object->id;
        after_id:        $result['id'] = $id;

        
        $nodeId = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        
        $avatarUrl = $object->avatarUrl;
        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        
        $gravatarId = $object->gravatarId;

        if ($gravatarId === null) {
            goto after_gravatarId;
        }
        after_gravatarId:        $result['gravatar_id'] = $gravatarId;

        
        $url = $object->url;
        after_url:        $result['url'] = $url;

        
        $htmlUrl = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        
        $followersUrl = $object->followersUrl;
        after_followersUrl:        $result['followers_url'] = $followersUrl;

        
        $followingUrl = $object->followingUrl;
        after_followingUrl:        $result['following_url'] = $followingUrl;

        
        $gistsUrl = $object->gistsUrl;
        after_gistsUrl:        $result['gists_url'] = $gistsUrl;

        
        $starredUrl = $object->starredUrl;
        after_starredUrl:        $result['starred_url'] = $starredUrl;

        
        $subscriptionsUrl = $object->subscriptionsUrl;
        after_subscriptionsUrl:        $result['subscriptions_url'] = $subscriptionsUrl;

        
        $organizationsUrl = $object->organizationsUrl;
        after_organizationsUrl:        $result['organizations_url'] = $organizationsUrl;

        
        $reposUrl = $object->reposUrl;
        after_reposUrl:        $result['repos_url'] = $reposUrl;

        
        $eventsUrl = $object->eventsUrl;
        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        
        $receivedEventsUrl = $object->receivedEventsUrl;
        after_receivedEventsUrl:        $result['received_events_url'] = $receivedEventsUrl;

        
        $type = $object->type;
        after_type:        $result['type'] = $type;

        
        $siteAdmin = $object->siteAdmin;
        after_siteAdmin:        $result['site_admin'] = $siteAdmin;

        
        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }
        after_name:        $result['name'] = $name;

        
        $company = $object->company;

        if ($company === null) {
            goto after_company;
        }
        after_company:        $result['company'] = $company;

        
        $blog = $object->blog;

        if ($blog === null) {
            goto after_blog;
        }
        after_blog:        $result['blog'] = $blog;

        
        $location = $object->location;

        if ($location === null) {
            goto after_location;
        }
        after_location:        $result['location'] = $location;

        
        $email = $object->email;

        if ($email === null) {
            goto after_email;
        }
        after_email:        $result['email'] = $email;

        
        $hireable = $object->hireable;

        if ($hireable === null) {
            goto after_hireable;
        }
        after_hireable:        $result['hireable'] = $hireable;

        
        $bio = $object->bio;

        if ($bio === null) {
            goto after_bio;
        }
        after_bio:        $result['bio'] = $bio;

        
        $twitterUsername = $object->twitterUsername;

        if ($twitterUsername === null) {
            goto after_twitterUsername;
        }
        after_twitterUsername:        $result['twitter_username'] = $twitterUsername;

        
        $publicRepos = $object->publicRepos;
        after_publicRepos:        $result['public_repos'] = $publicRepos;

        
        $publicGists = $object->publicGists;
        after_publicGists:        $result['public_gists'] = $publicGists;

        
        $followers = $object->followers;
        after_followers:        $result['followers'] = $followers;

        
        $following = $object->following;
        after_following:        $result['following'] = $following;

        
        $createdAt = $object->createdAt;
        after_createdAt:        $result['created_at'] = $createdAt;

        
        $updatedAt = $object->updatedAt;
        after_updatedAt:        $result['updated_at'] = $updatedAt;

        
        $privateGists = $object->privateGists;
        after_privateGists:        $result['private_gists'] = $privateGists;

        
        $totalPrivateRepos = $object->totalPrivateRepos;
        after_totalPrivateRepos:        $result['total_private_repos'] = $totalPrivateRepos;

        
        $ownedPrivateRepos = $object->ownedPrivateRepos;
        after_ownedPrivateRepos:        $result['owned_private_repos'] = $ownedPrivateRepos;

        
        $diskUsage = $object->diskUsage;
        after_diskUsage:        $result['disk_usage'] = $diskUsage;

        
        $collaborators = $object->collaborators;
        after_collaborators:        $result['collaborators'] = $collaborators;

        
        $twoFactorAuthentication = $object->twoFactorAuthentication;
        after_twoFactorAuthentication:        $result['two_factor_authentication'] = $twoFactorAuthentication;

        
        $plan = $object->plan;

        if ($plan === null) {
            goto after_plan;
        }
        $plan = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser⚡️Plan($plan);
        after_plan:        $result['plan'] = $plan;

        
        $suspendedAt = $object->suspendedAt;

        if ($suspendedAt === null) {
            goto after_suspendedAt;
        }
        after_suspendedAt:        $result['suspended_at'] = $suspendedAt;

        
        $businessPlus = $object->businessPlus;

        if ($businessPlus === null) {
            goto after_businessPlus;
        }
        after_businessPlus:        $result['business_plus'] = $businessPlus;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️LdapMappingUser⚡️Plan(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterprise\Schema\LdapMappingUser\Plan);
        $result = [];

        $collaborators = $object->collaborators;
        after_collaborators:        $result['collaborators'] = $collaborators;

        
        $name = $object->name;
        after_name:        $result['name'] = $name;

        
        $space = $object->space;
        after_space:        $result['space'] = $space;

        
        $privateRepos = $object->privateRepos;
        after_privateRepos:        $result['private_repos'] = $privateRepos;


        return $result;
    }
    
    

    /**
     * @template T
     *
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToHydrateObject
     */
    public function hydrateObjects(string $className, iterable $payloads): IterableList
    {
        return new IterableList($this->doHydrateObjects($className, $payloads));
    }

    private function doHydrateObjects(string $className, iterable $payloads): Generator
    {
        foreach ($payloads as $index => $payload) {
            yield $index => $this->hydrateObject($className, $payload);
        }
    }

    /**
     * @template T
     *
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToSerializeObject
     */
    public function serializeObjects(iterable $payloads): IterableList
    {
        return new IterableList($this->doSerializeObjects($payloads));
    }

    private function doSerializeObjects(iterable $objects): Generator
    {
        foreach ($objects as $index => $object) {
            yield $index => $this->serializeObject($object);
        }
    }
}
