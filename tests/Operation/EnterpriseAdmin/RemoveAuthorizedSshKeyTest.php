<?php

declare(strict_types=1);

namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterprise\Client;
use ApiClients\Client\GitHubEnterprise\Operation\EnterpriseAdmin\RemoveAuthorizedSshKey;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Prophecy\Argument;
use React\Http\Browser;
use React\Http\Message\Response;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;

use function json_decode;
use function React\Promise\resolve;

final class RemoveAuthorizedSshKeyTest extends AsyncTestCase
{
    /**
     * @test
     */
    public function httpCode_200_requestContentType_application_x_www_form_urlencoded_responseContentType_application_json(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], '[' . Schema\SshKey::SCHEMA_EXAMPLE_DATA . ']');
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('DELETE', '/setup/api/settings/authorized-keys', Argument::type('array'), Schema\EnterpriseAdmin\RemoveAuthorizedSshKey\Request\ApplicationxWwwFormUrlencoded::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(RemoveAuthorizedSshKey::OPERATION_MATCH, (static function (array $data): array {
            return $data;
        })(json_decode(Schema\EnterpriseAdmin\RemoveAuthorizedSshKey\Request\ApplicationxWwwFormUrlencoded::SCHEMA_EXAMPLE_DATA, true)));
    }
}
