<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Operation;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Operator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Meta
{
    private array $operator = [];

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators)
    {
    }

    public function root(): Schema\Root
    {
        if (array_key_exists(Operator\Meta\Root::class, $this->operator) === false) {
            $this->operator[Operator\Meta\Root::class] = new Operator\Meta\Root($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Root());
        }

        return $this->operator[Operator\Meta\Root::class]->call();
    }

    public function get(): Schema\ApiOverview
    {
        if (array_key_exists(Operator\Meta\Get::class, $this->operator) === false) {
            $this->operator[Operator\Meta\Get::class] = new Operator\Meta\Get($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Meta());
        }

        return $this->operator[Operator\Meta\Get::class]->call();
    }

    public function getOctocat(string $s): Schema\Operations\Meta\GetOctocat\Response\ApplicationOctocatStream\Ok
    {
        if (array_key_exists(Operator\Meta\GetOctocat::class, $this->operator) === false) {
            $this->operator[Operator\Meta\GetOctocat::class] = new Operator\Meta\GetOctocat($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Octocat());
        }

        return $this->operator[Operator\Meta\GetOctocat::class]->call($s);
    }

    public function getZen(): Schema\Operations\Meta\GetZen\Response\ApplicationJson\Ok
    {
        if (array_key_exists(Operator\Meta\GetZen::class, $this->operator) === false) {
            $this->operator[Operator\Meta\GetZen::class] = new Operator\Meta\GetZen($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Zen());
        }

        return $this->operator[Operator\Meta\GetZen::class]->call();
    }
}
