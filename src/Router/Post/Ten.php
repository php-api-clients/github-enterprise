<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Router\Post;

use ApiClients\Client\GitHubEnterprise\Hydrators;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\Schema\Reaction;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Ten
{
    private array $router = [];

    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    public function call(string $call, array $params, array $pathChunks): Reaction|array
    {
        $matched = false;
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($pathChunks[3] === 'teams') {
                        if ($pathChunks[4] === '{team_slug}') {
                            if ($pathChunks[5] === 'discussions') {
                                if ($pathChunks[6] === '{discussion_number}') {
                                    if ($pathChunks[7] === 'comments') {
                                        if ($pathChunks[8] === '{comment_number}') {
                                            if ($pathChunks[9] === 'reactions') {
                                                if ($call === 'POST /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/comments/{comment_number}/reactions') {
                                                    $matched = true;
                                                    if (array_key_exists(Router\Post\Reactions::class, $this->router) === false) {
                                                        $this->router[Router\Post\Reactions::class] = new Router\Post\Reactions($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                                                    }

                                                    return $this->router[Router\Post\Reactions::class]->CreateForTeamDiscussionCommentInOrg($params);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($matched === false) {
            throw new InvalidArgumentException();
        }
    }
}
