<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Hydrator\Operation;

use EventSauce\ObjectHydrator\IterableList;
use EventSauce\ObjectHydrator\ObjectMapper;
use EventSauce\ObjectHydrator\UnableToHydrateObject;
use EventSauce\ObjectHydrator\UnableToSerializeObject;
use Generator;

class Meta implements ObjectMapper
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
            'ApiClients\Client\GitHubEnterprise\Schema\ApiOverview' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview($payload),
                'ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview⚡️Domains($payload),
            default => throw UnableToHydrateObject::noHydrationDefined($className, $this->hydrationStack),
        };
    }
    
            
    private function hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview(array $payload): \ApiClients\Client\GitHubEnterprise\Schema\ApiOverview
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['verifiable_password_authentication'] ?? null;

            if ($value === null) {
                $missingFields[] = 'verifiable_password_authentication';
                goto after_verifiablePasswordAuthentication;
            }

            $properties['verifiablePasswordAuthentication'] = $value;

            after_verifiablePasswordAuthentication:

            $value = $payload['packages'] ?? null;

            if ($value === null) {
                $properties['packages'] = null;
                goto after_packages;
            }

            $properties['packages'] = $value;

            after_packages:

            $value = $payload['dependabot'] ?? null;

            if ($value === null) {
                $properties['dependabot'] = null;
                goto after_dependabot;
            }

            $properties['dependabot'] = $value;

            after_dependabot:

            $value = $payload['domains'] ?? null;

            if ($value === null) {
                $properties['domains'] = null;
                goto after_domains;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'domains';
                    $value = $this->hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview⚡️Domains($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['domains'] = $value;

            after_domains:

            $value = $payload['installed_version'] ?? null;

            if ($value === null) {
                $properties['installedVersion'] = null;
                goto after_installedVersion;
            }

            $properties['installedVersion'] = $value;

            after_installedVersion:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\ApiOverview', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterprise\Schema\ApiOverview::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterprise\Schema\ApiOverview(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\ApiOverview', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview⚡️Domains(array $payload): \ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['website'] ?? null;

            if ($value === null) {
                $properties['website'] = null;
                goto after_website;
            }

            $properties['website'] = $value;

            after_website:

            $value = $payload['codespaces'] ?? null;

            if ($value === null) {
                $properties['codespaces'] = null;
                goto after_codespaces;
            }

            $properties['codespaces'] = $value;

            after_codespaces:

            $value = $payload['copilot'] ?? null;

            if ($value === null) {
                $properties['copilot'] = null;
                goto after_copilot;
            }

            $properties['copilot'] = $value;

            after_copilot:

            $value = $payload['packages'] ?? null;

            if ($value === null) {
                $properties['packages'] = null;
                goto after_packages;
            }

            $properties['packages'] = $value;

            after_packages:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains', $exception, stack: $this->hydrationStack);
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
            'ApiClients\Client\GitHubEnterprise\Schema\ApiOverview' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview($object),
            'ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview⚡️Domains($object),
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


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterprise\Schema\ApiOverview);
        $result = [];

        $verifiablePasswordAuthentication = $object->verifiablePasswordAuthentication;
        after_verifiablePasswordAuthentication:        $result['verifiable_password_authentication'] = $verifiablePasswordAuthentication;

        
        $packages = $object->packages;

        if ($packages === null) {
            goto after_packages;
        }
        static $packagesSerializer0;

        if ($packagesSerializer0 === null) {
            $packagesSerializer0 = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        $packages = $packagesSerializer0->serialize($packages, $this);
        after_packages:        $result['packages'] = $packages;

        
        $dependabot = $object->dependabot;

        if ($dependabot === null) {
            goto after_dependabot;
        }
        static $dependabotSerializer0;

        if ($dependabotSerializer0 === null) {
            $dependabotSerializer0 = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        $dependabot = $dependabotSerializer0->serialize($dependabot, $this);
        after_dependabot:        $result['dependabot'] = $dependabot;

        
        $domains = $object->domains;

        if ($domains === null) {
            goto after_domains;
        }
        $domains = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview⚡️Domains($domains);
        after_domains:        $result['domains'] = $domains;

        
        $installedVersion = $object->installedVersion;

        if ($installedVersion === null) {
            goto after_installedVersion;
        }
        after_installedVersion:        $result['installed_version'] = $installedVersion;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterprise⚡️Schema⚡️ApiOverview⚡️Domains(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterprise\Schema\ApiOverview\Domains);
        $result = [];

        $website = $object->website;

        if ($website === null) {
            goto after_website;
        }
        static $websiteSerializer0;

        if ($websiteSerializer0 === null) {
            $websiteSerializer0 = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        $website = $websiteSerializer0->serialize($website, $this);
        after_website:        $result['website'] = $website;

        
        $codespaces = $object->codespaces;

        if ($codespaces === null) {
            goto after_codespaces;
        }
        static $codespacesSerializer0;

        if ($codespacesSerializer0 === null) {
            $codespacesSerializer0 = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        $codespaces = $codespacesSerializer0->serialize($codespaces, $this);
        after_codespaces:        $result['codespaces'] = $codespaces;

        
        $copilot = $object->copilot;

        if ($copilot === null) {
            goto after_copilot;
        }
        static $copilotSerializer0;

        if ($copilotSerializer0 === null) {
            $copilotSerializer0 = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        $copilot = $copilotSerializer0->serialize($copilot, $this);
        after_copilot:        $result['copilot'] = $copilot;

        
        $packages = $object->packages;

        if ($packages === null) {
            goto after_packages;
        }
        static $packagesSerializer0;

        if ($packagesSerializer0 === null) {
            $packagesSerializer0 = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        $packages = $packagesSerializer0->serialize($packages, $this);
        after_packages:        $result['packages'] = $packages;


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
