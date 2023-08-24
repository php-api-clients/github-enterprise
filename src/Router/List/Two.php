<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\List;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Two
{
    private array $router = [];

    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return (Observable<Schema\Authorization>|array{code: int})|(Observable<Schema\Event>|(Observable<Schema\BaseGist>|(Observable<Schema\Issue>|(Observable<Schema\LicenseSimple>|(Observable<Schema\Thread> */
    public function call(string $call, array $params, array $pathChunks): iterable
    {
        $matched = false;
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'authorizations') {
                if ($call === 'LIST /authorizations') {
                    $matched = true;
                    if (array_key_exists(Router\List\OauthAuthorizations::class, $this->router) === false) {
                        $this->router[Router\List\OauthAuthorizations::class] = new Router\List\OauthAuthorizations($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }

                    return $this->router[Router\List\OauthAuthorizations::class]->ListAuthorizationsListing($params);
                }
            } elseif ($pathChunks[1] === 'events') {
                if ($call === 'LIST /events') {
                    $matched = true;
                    if (array_key_exists(Router\List\Activity::class, $this->router) === false) {
                        $this->router[Router\List\Activity::class] = new Router\List\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }

                    return $this->router[Router\List\Activity::class]->ListPublicEventsListing($params);
                }
            } elseif ($pathChunks[1] === 'gists') {
                if ($call === 'LIST /gists') {
                    $matched = true;
                    if (array_key_exists(Router\List\Gists::class, $this->router) === false) {
                        $this->router[Router\List\Gists::class] = new Router\List\Gists($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }

                    return $this->router[Router\List\Gists::class]->ListListing($params);
                }
            } elseif ($pathChunks[1] === 'issues') {
                if ($call === 'LIST /issues') {
                    $matched = true;
                    if (array_key_exists(Router\List\Issues::class, $this->router) === false) {
                        $this->router[Router\List\Issues::class] = new Router\List\Issues($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }

                    return $this->router[Router\List\Issues::class]->ListListing($params);
                }
            } elseif ($pathChunks[1] === 'licenses') {
                if ($call === 'LIST /licenses') {
                    $matched = true;
                    if (array_key_exists(Router\List\Licenses::class, $this->router) === false) {
                        $this->router[Router\List\Licenses::class] = new Router\List\Licenses($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }

                    return $this->router[Router\List\Licenses::class]->GetAllCommonlyUsedListing($params);
                }
            } elseif ($pathChunks[1] === 'notifications') {
                if ($call === 'LIST /notifications') {
                    $matched = true;
                    if (array_key_exists(Router\List\Activity::class, $this->router) === false) {
                        $this->router[Router\List\Activity::class] = new Router\List\Activity($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }

                    return $this->router[Router\List\Activity::class]->ListNotificationsForAuthenticatedUserListing($params);
                }
            }
        }

        if ($matched === false) {
            throw new InvalidArgumentException();
        }
    }
}
