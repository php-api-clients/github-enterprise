<?php

declare(strict_types=1);

namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Reactions;

use ApiClients\Client\GitHubEnterprise\Client;
use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Operation\Reactions\CreateForCommitComment;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Prophecy\Argument;
use React\Http\Browser;
use React\Http\Message\Response;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;

use function json_decode;
use function React\Promise\resolve;

final class CreateForCommitCommentTest extends AsyncTestCase
{
    /**
     * @test
     */
    public function httpCode_200_requestContentType_application_json_responseContentType_application_json(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], Schema\Reaction::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('POST', '/repos/generated_null/generated_null/comments/13/reactions', Argument::type('array'), Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(CreateForCommitComment::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']      = 'generated_null';
            $data['repo']       = 'generated_null';
            $data['comment_id'] = 13;

            return $data;
        })(json_decode(Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /**
     * @test
     */
    public function httpCode_201_requestContentType_application_json_responseContentType_application_json(): void
    {
        $response = new Response(201, ['Content-Type' => 'application/json'], Schema\Reaction::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('POST', '/repos/generated_null/generated_null/comments/13/reactions', Argument::type('array'), Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(CreateForCommitComment::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']      = 'generated_null';
            $data['repo']       = 'generated_null';
            $data['comment_id'] = 13;

            return $data;
        })(json_decode(Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /**
     * @test
     */
    public function httpCode_422_requestContentType_application_json_responseContentType_application_json(): void
    {
        self::expectException(ErrorSchemas\ValidationError::class);
        $response = new Response(422, ['Content-Type' => 'application/json'], Schema\ValidationError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('POST', '/repos/generated_null/generated_null/comments/13/reactions', Argument::type('array'), Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(CreateForCommitComment::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']      = 'generated_null';
            $data['repo']       = 'generated_null';
            $data['comment_id'] = 13;

            return $data;
        })(json_decode(Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /**
     * @test
     */
    public function httpCode_415_requestContentType_application_json_responseContentType_application_json(): void
    {
        self::expectException(ErrorSchemas\Operation\Reactions\CreateForCommitComment\Response\Applicationjson\H415::class);
        $response = new Response(415, ['Content-Type' => 'application/json'], Schema\Operation\Reactions\CreateForCommitComment\Response\Applicationjson\H415::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('POST', '/repos/generated_null/generated_null/comments/13/reactions', Argument::type('array'), Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(CreateForCommitComment::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']      = 'generated_null';
            $data['repo']       = 'generated_null';
            $data['comment_id'] = 13;

            return $data;
        })(json_decode(Schema\Reactions\CreateForCommitComment\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
}
