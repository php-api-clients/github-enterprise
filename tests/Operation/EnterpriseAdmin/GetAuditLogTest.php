<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Hydrator;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\WebHook;
use ApiClients\Client\GitHubEnterprise\Router;
use ApiClients\Client\GitHubEnterprise\ChunkSize;
final class GetAuditLogTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function httpCode_200_responseContentType_application_json()
    {
        $response = new \React\Http\Message\Response(200, array('Content-Type' => 'application/json'), '[' . (Schema\AuditLogEvent::SCHEMA_EXAMPLE_DATA . ']'));
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/enterprises/generated_null/audit-log?phrase=generated_null&after=generated_null&before=generated_null&order=generated_null&page=13&per_page=13', \Prophecy\Argument::type('array'), \Prophecy\Argument::any())->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\GitHubEnterprise\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\GetAuditLog::OPERATION_MATCH, (static function (array $data) : array {
            $data['enterprise'] = 'generated_null';
            $data['phrase'] = 'generated_null';
            $data['after'] = 'generated_null';
            $data['before'] = 'generated_null';
            $data['order'] = 'generated_null';
            $data['page'] = 13;
            $data['per_page'] = 13;
            return $data;
        })(array()));
    }
}
