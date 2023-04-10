<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Teams;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
final class AddOrUpdateProjectPermissionsInOrgTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function t403td1f5a9d446c6cec2cf63545e8163e585()
    {
        self::expectException(ErrorSchemas\Operation\Teams\AddOrUpdateProjectPermissionsInOrg\Response\Applicationjson\H403::class);
        $response = new \React\Http\Message\Response(403, array('Content-Type' => 'application/json'), Schema\Operation\Teams\AddOrUpdateProjectPermissionsInOrg\Response\Applicationjson\H403::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/orgs/generated_null/teams/generated_null/projects/13', \Prophecy\Argument::type('array'), Schema\Teams\AddOrUpdateProjectPermissionsInOrg\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\Teams\AddOrUpdateProjectPermissionsInOrg::OPERATION_MATCH, (static function (array $data) : array {
            $data['org'] = 'generated_null';
            $data['team_slug'] = 'generated_null';
            $data['project_id'] = 13;
            return $data;
        })(json_decode(Schema\Teams\AddOrUpdateProjectPermissionsInOrg\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
}
