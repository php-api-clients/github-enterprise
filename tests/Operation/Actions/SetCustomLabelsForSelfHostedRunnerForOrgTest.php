<?php

declare(strict_types=1);

namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Actions;

use ApiClients\Client\GitHubEnterprise\Client;
use ApiClients\Client\GitHubEnterprise\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Prophecy\Argument;
use React\Http\Browser;
use React\Http\Message\Response;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;

use function json_decode;
use function React\Async\await;
use function React\Promise\resolve;

final class SetCustomLabelsForSelfHostedRunnerForOrgTest extends AsyncTestCase
{
    /** @test */
    public function call_httpCode_200_requestContentType_application_json_responseContentType_application_json_zero(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/orgs/generated/actions/runners/9/labels', Argument::type('array'), Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Actions\SetCustomLabelsForSelfHostedRunnerForOrg::OPERATION_MATCH, (static function (array $data): array {
            $data['org']       = 'generated';
            $data['runner_id'] = 9;

            return $data;
        })(json_decode(Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /** @test */
    public function operations_httpCode_200_requestContentType_application_json_responseContentType_application_json_zero(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/orgs/generated/actions/runners/9/labels', Argument::type('array'), Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->actions()->setCustomLabelsForSelfHostedRunnerForOrg('generated', 9, json_decode(Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /** @test */
    public function call_httpCode_404_requestContentType_application_json_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new Response(404, ['Content-Type' => 'application/json'], Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/orgs/generated/actions/runners/9/labels', Argument::type('array'), Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Actions\SetCustomLabelsForSelfHostedRunnerForOrg::OPERATION_MATCH, (static function (array $data): array {
            $data['org']       = 'generated';
            $data['runner_id'] = 9;

            return $data;
        })(json_decode(Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /** @test */
    public function operations_httpCode_404_requestContentType_application_json_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new Response(404, ['Content-Type' => 'application/json'], Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/orgs/generated/actions/runners/9/labels', Argument::type('array'), Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->actions()->setCustomLabelsForSelfHostedRunnerForOrg('generated', 9, json_decode(Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /** @test */
    public function call_httpCode_422_requestContentType_application_json_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\ValidationErrorSimple::class);
        $response = new Response(422, ['Content-Type' => 'application/json'], Schema\ValidationErrorSimple::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/orgs/generated/actions/runners/9/labels', Argument::type('array'), Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Actions\SetCustomLabelsForSelfHostedRunnerForOrg::OPERATION_MATCH, (static function (array $data): array {
            $data['org']       = 'generated';
            $data['runner_id'] = 9;

            return $data;
        })(json_decode(Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA, true)));
    }

    /** @test */
    public function operations_httpCode_422_requestContentType_application_json_responseContentType_application_json_zero(): void
    {
        self::expectException(ErrorSchemas\ValidationErrorSimple::class);
        $response = new Response(422, ['Content-Type' => 'application/json'], Schema\ValidationErrorSimple::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/orgs/generated/actions/runners/9/labels', Argument::type('array'), Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA)->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->actions()->setCustomLabelsForSelfHostedRunnerForOrg('generated', 9, json_decode(Schema\Actions\SetCustomLabelsForSelfHostedRunnerForOrg\Request\ApplicationJson::SCHEMA_EXAMPLE_DATA, true)));
    }
}
