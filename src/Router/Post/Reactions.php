<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterprise\Router\Post;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class Reactions
{
    /**
     * @var array<class-string, \EventSauce\ObjectHydrator\ObjectMapper>
     */
    private array $hydrator = array();
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly \ApiClients\Client\GitHubEnterprise\Hydrators $hydrators;
    private readonly \React\Http\Browser $browser;
    private readonly \ApiClients\Contracts\HTTP\Headers\AuthenticationInterface $authentication;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, \ApiClients\Client\GitHubEnterprise\Hydrators $hydrators, \React\Http\Browser $browser, \ApiClients\Contracts\HTTP\Headers\AuthenticationInterface $authentication)
    {
        $this->requestSchemaValidator = $requestSchemaValidator;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrators = $hydrators;
        $this->browser = $browser;
        $this->authentication = $authentication;
    }
    public function createForTeamDiscussionLegacy(array $params)
    {
        $arguments = array();
        if (array_key_exists('team_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: team_id');
        }
        $arguments['team_id'] = $params['team_id'];
        unset($params['team_id']);
        if (array_key_exists('discussion_number', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: discussion_number');
        }
        $arguments['discussion_number'] = $params['discussion_number'];
        unset($params['discussion_number']);
        if (\array_key_exists(Hydrator\Operation\Teams\CbTeamIdRcb\Discussions\CbDiscussionNumberRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Teams\CbTeamIdRcb\Discussions\CbDiscussionNumberRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Teams🌀CbTeamIdRcb🌀Discussions🌀CbDiscussionNumberRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForTeamDiscussionLegacy($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Teams\CbTeamIdRcb\Discussions\CbDiscussionNumberRcb\Reactions::class], $arguments['team_id'], $arguments['discussion_number']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForCommitComment(array $params)
    {
        $arguments = array();
        if (array_key_exists('owner', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: owner');
        }
        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repo');
        }
        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('comment_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: comment_id');
        }
        $arguments['comment_id'] = $params['comment_id'];
        unset($params['comment_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Comments\CbCommentIdRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Comments\CbCommentIdRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Comments🌀CbCommentIdRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForCommitComment($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Comments\CbCommentIdRcb\Reactions::class], $arguments['owner'], $arguments['repo'], $arguments['comment_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForIssue(array $params)
    {
        $arguments = array();
        if (array_key_exists('owner', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: owner');
        }
        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repo');
        }
        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('issue_number', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: issue_number');
        }
        $arguments['issue_number'] = $params['issue_number'];
        unset($params['issue_number']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Issues\CbIssueNumberRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Issues\CbIssueNumberRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Issues🌀CbIssueNumberRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForIssue($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Issues\CbIssueNumberRcb\Reactions::class], $arguments['owner'], $arguments['repo'], $arguments['issue_number']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForRelease(array $params)
    {
        $arguments = array();
        if (array_key_exists('owner', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: owner');
        }
        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repo');
        }
        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('release_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: release_id');
        }
        $arguments['release_id'] = $params['release_id'];
        unset($params['release_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Releases\CbReleaseIdRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Releases\CbReleaseIdRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Releases🌀CbReleaseIdRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForRelease($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Releases\CbReleaseIdRcb\Reactions::class], $arguments['owner'], $arguments['repo'], $arguments['release_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForTeamDiscussionInOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('team_slug', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: team_slug');
        }
        $arguments['team_slug'] = $params['team_slug'];
        unset($params['team_slug']);
        if (array_key_exists('discussion_number', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: discussion_number');
        }
        $arguments['discussion_number'] = $params['discussion_number'];
        unset($params['discussion_number']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\Discussions\CbDiscussionNumberRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\Discussions\CbDiscussionNumberRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Teams🌀CbTeamSlugRcb🌀Discussions🌀CbDiscussionNumberRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForTeamDiscussionInOrg($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\Discussions\CbDiscussionNumberRcb\Reactions::class], $arguments['org'], $arguments['team_slug'], $arguments['discussion_number']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForIssueComment(array $params)
    {
        $arguments = array();
        if (array_key_exists('owner', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: owner');
        }
        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repo');
        }
        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('comment_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: comment_id');
        }
        $arguments['comment_id'] = $params['comment_id'];
        unset($params['comment_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Issues\Comments\CbCommentIdRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Issues\Comments\CbCommentIdRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Issues🌀Comments🌀CbCommentIdRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForIssueComment($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Issues\Comments\CbCommentIdRcb\Reactions::class], $arguments['owner'], $arguments['repo'], $arguments['comment_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForPullRequestReviewComment(array $params)
    {
        $arguments = array();
        if (array_key_exists('owner', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: owner');
        }
        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: repo');
        }
        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('comment_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: comment_id');
        }
        $arguments['comment_id'] = $params['comment_id'];
        unset($params['comment_id']);
        if (\array_key_exists(Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Pulls\Comments\CbCommentIdRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Pulls\Comments\CbCommentIdRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀CbOwnerRcb🌀CbRepoRcb🌀Pulls🌀Comments🌀CbCommentIdRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForPullRequestReviewComment($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Pulls\Comments\CbCommentIdRcb\Reactions::class], $arguments['owner'], $arguments['repo'], $arguments['comment_id']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForTeamDiscussionCommentLegacy(array $params)
    {
        $arguments = array();
        if (array_key_exists('team_id', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: team_id');
        }
        $arguments['team_id'] = $params['team_id'];
        unset($params['team_id']);
        if (array_key_exists('discussion_number', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: discussion_number');
        }
        $arguments['discussion_number'] = $params['discussion_number'];
        unset($params['discussion_number']);
        if (array_key_exists('comment_number', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: comment_number');
        }
        $arguments['comment_number'] = $params['comment_number'];
        unset($params['comment_number']);
        if (\array_key_exists(Hydrator\Operation\Teams\CbTeamIdRcb\Discussions\CbDiscussionNumberRcb\Comments\CbCommentNumberRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Teams\CbTeamIdRcb\Discussions\CbDiscussionNumberRcb\Comments\CbCommentNumberRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Teams🌀CbTeamIdRcb🌀Discussions🌀CbDiscussionNumberRcb🌀Comments🌀CbCommentNumberRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForTeamDiscussionCommentLegacy($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Teams\CbTeamIdRcb\Discussions\CbDiscussionNumberRcb\Comments\CbCommentNumberRcb\Reactions::class], $arguments['team_id'], $arguments['discussion_number'], $arguments['comment_number']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
    public function createForTeamDiscussionCommentInOrg(array $params)
    {
        $arguments = array();
        if (array_key_exists('org', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: org');
        }
        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('team_slug', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: team_slug');
        }
        $arguments['team_slug'] = $params['team_slug'];
        unset($params['team_slug']);
        if (array_key_exists('discussion_number', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: discussion_number');
        }
        $arguments['discussion_number'] = $params['discussion_number'];
        unset($params['discussion_number']);
        if (array_key_exists('comment_number', $params) === false) {
            throw new \InvalidArgumentException('Missing mandatory field: comment_number');
        }
        $arguments['comment_number'] = $params['comment_number'];
        unset($params['comment_number']);
        if (\array_key_exists(Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\Discussions\CbDiscussionNumberRcb\Comments\CbCommentNumberRcb\Reactions::class, $this->hydrator) == false) {
            $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\Discussions\CbDiscussionNumberRcb\Comments\CbCommentNumberRcb\Reactions::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀CbOrgRcb🌀Teams🌀CbTeamSlugRcb🌀Discussions🌀CbDiscussionNumberRcb🌀Comments🌀CbCommentNumberRcb🌀Reactions();
        }
        $operation = new Operation\Reactions\CreateForTeamDiscussionCommentInOrg($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\Discussions\CbDiscussionNumberRcb\Comments\CbCommentNumberRcb\Reactions::class], $arguments['org'], $arguments['team_slug'], $arguments['discussion_number'], $arguments['comment_number']);
        $request = $operation->createRequest($params);
        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(function (\Psr\Http\Message\ResponseInterface $response) use($operation) : \ApiClients\Client\GitHubEnterprise\Schema\Reaction {
            return $operation->createResponse($response);
        });
    }
}
