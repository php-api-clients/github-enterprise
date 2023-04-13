<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class DeletePreReceiveEnvironmentTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function httpCode_422_responseContentType_application_json()
    {
        self::expectException(ErrorSchemas\Operation\EnterpriseAdmin\DeletePreReceiveEnvironment\Response\Applicationjson\H422::class);
        $response = new \React\Http\Message\Response(422, array('Content-Type' => 'application/json'), Schema\Operation\EnterpriseAdmin\DeletePreReceiveEnvironment\Response\Applicationjson\H422::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('DELETE', '/admin/pre-receive-environments/13', \Prophecy\Argument::type('array'), \Prophecy\Argument::any())->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\DeletePreReceiveEnvironment::OPERATION_MATCH, (static function (array $data) : array {
            $data['pre_receive_environment_id'] = 13;
            return $data;
        })(array()));
    }
}
