<?php

declare(strict_types=1);

namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Repos;

use ApiClients\Client\GitHubEnterprise\Client;
use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Operation\Repos\GetReleaseAsset;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Prophecy\Argument;
use React\Http\Browser;
use React\Http\Message\Response;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;

use function React\Promise\resolve;

final class GetReleaseAssetTest extends AsyncTestCase
{
    /**
     * @test
     */
    public function httpCode_200_responseContentType_application_json(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], Schema\ReleaseAsset::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/repos/generated_null/generated_null/releases/assets/13', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(GetReleaseAsset::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']    = 'generated_null';
            $data['repo']     = 'generated_null';
            $data['asset_id'] = 13;

            return $data;
        })([]));
    }

    /**
     * @test
     */
    public function httpCode_404_responseContentType_application_json(): void
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new Response(404, ['Content-Type' => 'application/json'], Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/repos/generated_null/generated_null/releases/assets/13', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(GetReleaseAsset::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']    = 'generated_null';
            $data['repo']     = 'generated_null';
            $data['asset_id'] = 13;

            return $data;
        })([]));
    }

    /**
     * @test
     */
    public function httpCode_415_responseContentType_application_json(): void
    {
        self::expectException(ErrorSchemas\Operation\Apps\GetInstallation\Response\Applicationjson\H415::class);
        $response = new Response(415, ['Content-Type' => 'application/json'], Schema\Operation\Apps\GetInstallation\Response\Applicationjson\H415::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/repos/generated_null/generated_null/releases/assets/13', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $client->call(GetReleaseAsset::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']    = 'generated_null';
            $data['repo']     = 'generated_null';
            $data['asset_id'] = 13;

            return $data;
        })([]));
    }
}
