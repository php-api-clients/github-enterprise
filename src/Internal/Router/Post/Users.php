<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Router\Post;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\GpgKey;
use ApiClients\Client\GitHubEnterprise\Schema\Key;
use ApiClients\Client\GitHubEnterprise\Schema\SshSigningKey;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

final class Users
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return iterable<int,Schema\Email>|WithoutBody */
    public function addEmailForAuthenticatedUser(array $params): iterable|WithoutBody
    {
        $operator = new Internal\Operator\Users\AddEmailForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀Emails());

        return $operator->call($params);
    }

    public function createGpgKeyForAuthenticatedUser(array $params): GpgKey|WithoutBody
    {
        $operator = new Internal\Operator\Users\CreateGpgKeyForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀GpgKeys());

        return $operator->call($params);
    }

    public function createPublicSshKeyForAuthenticatedUser(array $params): Key|WithoutBody
    {
        $operator = new Internal\Operator\Users\CreatePublicSshKeyForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀Keys());

        return $operator->call($params);
    }

    /** @return iterable<int,Schema\SocialAccount>|WithoutBody */
    public function addSocialAccountForAuthenticatedUser(array $params): iterable|WithoutBody
    {
        $operator = new Internal\Operator\Users\AddSocialAccountForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀SocialAccounts());

        return $operator->call($params);
    }

    public function createSshSigningKeyForAuthenticatedUser(array $params): SshSigningKey|WithoutBody
    {
        $operator = new Internal\Operator\Users\CreateSshSigningKeyForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀SshSigningKeys());

        return $operator->call($params);
    }
}
