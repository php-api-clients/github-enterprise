<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Router\Patch;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\Authorization;
use ApiClients\Client\GitHubEnterprise\Schema\WebhookConfig;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Apps
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return Schema\WebhookConfig */
    public function updateWebhookConfigForApp(array $params): WebhookConfig|array
    {
        $operator = new Internal\Operator\Apps\UpdateWebhookConfigForApp($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀App🌀Hook🌀Config());

        return $operator->call($params);
    }

    /** @return Schema\Authorization */
    public function resetToken(array $params): Authorization|array
    {
        $arguments = [];
        if (array_key_exists('client_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: client_id');
        }

        $arguments['client_id'] = $params['client_id'];
        unset($params['client_id']);
        $operator = new Internal\Operator\Apps\ResetToken($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Applications🌀ClientId🌀Token());

        return $operator->call($arguments['client_id'], $params);
    }
}
