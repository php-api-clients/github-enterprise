<?php

declare(strict_types=1);

namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Activity;

use ApiClients\Client\GitHubEnterprise\Client;
use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Prophecy\Argument;
use React\Http\Browser;
use React\Http\Message\Response;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;

use function React\Async\await;
use function React\Promise\resolve;

final class ListNotificationsForAuthenticatedUserTest extends AsyncTestCase
{
    /**
     * @test
     */
    public function call_httpCode_403_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new Response(403, ['Content-Type' => 'application/json'], Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Activity\ListNotificationsForAuthenticatedUser::OPERATION_MATCH, (static function (array $data): array {
            $data['since']         = '1970-01-01T00:00:00+00:00';
            $data['before']        = '1970-01-01T00:00:00+00:00';
            $data['all']           = false;
            $data['participating'] = false;
            $data['page']          = 4;
            $data['per_page']      = 8;

            return $data;
        })([]));
    }

    /**
     * @test
     */
    public function operations_httpCode_403_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new Response(403, ['Content-Type' => 'application/json'], Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->activity()->listNotificationsForAuthenticatedUser('1970-01-01T00:00:00+00:00', '1970-01-01T00:00:00+00:00', false, false, 4, 8));
    }

    /**
     * @test
     */
    public function call_httpCode_401_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new Response(401, ['Content-Type' => 'application/json'], Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Activity\ListNotificationsForAuthenticatedUser::OPERATION_MATCH, (static function (array $data): array {
            $data['since']         = '1970-01-01T00:00:00+00:00';
            $data['before']        = '1970-01-01T00:00:00+00:00';
            $data['all']           = false;
            $data['participating'] = false;
            $data['page']          = 4;
            $data['per_page']      = 8;

            return $data;
        })([]));
    }

    /**
     * @test
     */
    public function operations_httpCode_401_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new Response(401, ['Content-Type' => 'application/json'], Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->activity()->listNotificationsForAuthenticatedUser('1970-01-01T00:00:00+00:00', '1970-01-01T00:00:00+00:00', false, false, 4, 8));
    }

    /**
     * @test
     */
    public function call_httpCode_422_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\ValidationError::class);
        $response = new Response(422, ['Content-Type' => 'application/json'], Schema\ValidationError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Activity\ListNotificationsForAuthenticatedUser::OPERATION_MATCH, (static function (array $data): array {
            $data['since']         = '1970-01-01T00:00:00+00:00';
            $data['before']        = '1970-01-01T00:00:00+00:00';
            $data['all']           = false;
            $data['participating'] = false;
            $data['page']          = 4;
            $data['per_page']      = 8;

            return $data;
        })([]));
    }

    /**
     * @test
     */
    public function operations_httpCode_422_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\ValidationError::class);
        $response = new Response(422, ['Content-Type' => 'application/json'], Schema\ValidationError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->activity()->listNotificationsForAuthenticatedUser('1970-01-01T00:00:00+00:00', '1970-01-01T00:00:00+00:00', false, false, 4, 8));
    }

    /**
     * @test
     */
    public function call_httpCode_304_empty(): void
    {
        $response = new Response(304, []);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Activity\ListNotificationsForAuthenticatedUser::OPERATION_MATCH, (static function (array $data): array {
            $data['since']         = '1970-01-01T00:00:00+00:00';
            $data['before']        = '1970-01-01T00:00:00+00:00';
            $data['all']           = false;
            $data['participating'] = false;
            $data['page']          = 4;
            $data['per_page']      = 8;

            return $data;
        })([]));
    }

    /**
     * @test
     */
    public function operations_httpCode_304_empty(): void
    {
        $response = new Response(304, []);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&page=4&per_page=8', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->activity()->listNotificationsForAuthenticatedUser('1970-01-01T00:00:00+00:00', '1970-01-01T00:00:00+00:00', false, false, 4, 8));
        self::assertArrayHasKey('code', $result);
        self::assertSame(304, $result['code']);
    }
}
