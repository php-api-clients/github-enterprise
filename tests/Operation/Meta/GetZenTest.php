<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Meta;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class GetZenTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function t200t46849f4a4904cf0d65bfbfb6525045f9()
    {
        $response = new \React\Http\Message\Response(200, array('Content-Type' => 'text/plain'), Schema\Operation\Meta\GetZen\Response\Textplain\H200::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/zen', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\Meta\GetZen::OPERATION_MATCH, array());
    }
}
