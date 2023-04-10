<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Issues;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class List_Test extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function t200td1f5a9d446c6cec2cf63545e8163e585()
    {
        $response = new \React\Http\Message\Response(200, array('Content-Type' => 'application/json'), '[' . (Schema\Issue::SCHEMA_EXAMPLE_DATA . ']'));
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/issues?labels=generated_null&since=1970-01-01T00:00:00+00:00&collab=&orgs=&owned=&pulls=&filter=generated_null&state=generated_null&sort=generated_null&direction=generated_null&per_page=13&page=13', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\Issues\List_::OPERATION_MATCH, array('labels' => 'generated_null', 'since' => '1970-01-01T00:00:00+00:00', 'collab' => false, 'orgs' => false, 'owned' => false, 'pulls' => false, 'filter' => 'generated_null', 'state' => 'generated_null', 'sort' => 'generated_null', 'direction' => 'generated_null', 'per_page' => 13, 'page' => 13));
    }
    /**
     * @test
     */
    public function t422td1f5a9d446c6cec2cf63545e8163e585()
    {
        self::expectException(ErrorSchemas\ValidationError::class);
        $response = new \React\Http\Message\Response(422, array('Content-Type' => 'application/json'), Schema\ValidationError::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/issues?labels=generated_null&since=1970-01-01T00:00:00+00:00&collab=&orgs=&owned=&pulls=&filter=generated_null&state=generated_null&sort=generated_null&direction=generated_null&per_page=13&page=13', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\Issues\List_::OPERATION_MATCH, array('labels' => 'generated_null', 'since' => '1970-01-01T00:00:00+00:00', 'collab' => false, 'orgs' => false, 'owned' => false, 'pulls' => false, 'filter' => 'generated_null', 'state' => 'generated_null', 'sort' => 'generated_null', 'direction' => 'generated_null', 'per_page' => 13, 'page' => 13));
    }
    /**
     * @test
     */
    public function t404td1f5a9d446c6cec2cf63545e8163e585()
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new \React\Http\Message\Response(404, array('Content-Type' => 'application/json'), Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/issues?labels=generated_null&since=1970-01-01T00:00:00+00:00&collab=&orgs=&owned=&pulls=&filter=generated_null&state=generated_null&sort=generated_null&direction=generated_null&per_page=13&page=13', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\Issues\List_::OPERATION_MATCH, array('labels' => 'generated_null', 'since' => '1970-01-01T00:00:00+00:00', 'collab' => false, 'orgs' => false, 'owned' => false, 'pulls' => false, 'filter' => 'generated_null', 'state' => 'generated_null', 'sort' => 'generated_null', 'direction' => 'generated_null', 'per_page' => 13, 'page' => 13));
    }
}
