<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class UpdateUsernameForUserTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function t202td1f5a9d446c6cec2cf63545e8163e585()
    {
        $response = new \React\Http\Message\Response(202, array('Content-Type' => 'application/json'), Schema\Operation\EnterpriseAdmin\UpdateUsernameForUser\Response\Applicationjson\H202::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('PATCH', '/admin/users/generated_null', \Prophecy\Argument::type('array'), Schema\EnterpriseAdmin\UpdateUsernameForUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\UpdateUsernameForUser::OPERATION_MATCH, (static function (array $data) : array {
            $data['username'] = 'generated_null';
            return $data;
        })(json_decode(Schema\EnterpriseAdmin\UpdateUsernameForUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
}
