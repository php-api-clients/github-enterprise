<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Patch;

use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Operator;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\PrivateUser;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use EventSauce\ObjectHydrator\ObjectMapper;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Users
{
    /** @var array<class-string, ObjectMapper> */
    private array $hydrator = [];

    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return (Schema\PrivateUser | array{code: int}) */
    public function updateAuthenticated(array $params): PrivateUser|array
    {
        $matched = true;
        if (array_key_exists(Hydrator\Operation\User::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User::class] = $this->hydrators->getObjectMapperOperation🌀User();
        }

        $operator = new Operator\Users\UpdateAuthenticated($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User::class]);

        return $operator->call($params);
    }
}
