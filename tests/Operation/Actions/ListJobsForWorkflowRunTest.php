<?php

declare(strict_types=1);

namespace ApiClients\Tests\Client\GitHubEnterprise\Operation\Actions;

use ApiClients\Client\GitHubEnterprise\Client;
use ApiClients\Client\GitHubEnterprise\Operation;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Prophecy\Argument;
use React\Http\Browser;
use React\Http\Message\Response;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;

use function React\Async\await;
use function React\Promise\resolve;

final class ListJobsForWorkflowRunTest extends AsyncTestCase
{
    /**
     * @test
     */
    public function call_httpCode_200_responseContentType_application_json_zero(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], Schema\Operations\Actions\ListJobsForWorkflowRunAttempt\Response\ApplicationJson\Ok::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/repos/generated/generated/actions/runs/6/jobs?filter=generated&per_page=8&page=4', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = $client->call(Operation\Actions\ListJobsForWorkflowRun::OPERATION_MATCH, (static function (array $data): array {
            $data['owner']    = 'generated';
            $data['repo']     = 'generated';
            $data['run_id']   = 6;
            $data['filter']   = 'generated';
            $data['per_page'] = 8;
            $data['page']     = 4;

            return $data;
        })([]));
    }

    /**
     * @test
     */
    public function operations_httpCode_200_responseContentType_application_json_zero(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], Schema\Operations\Actions\ListJobsForWorkflowRunAttempt\Response\ApplicationJson\Ok::SCHEMA_EXAMPLE_DATA);
        $auth     = $this->prophesize(AuthenticationInterface::class);
        $auth->authHeader(Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(Browser::class);
        $browser->withBase(Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/repos/generated/generated/actions/runs/6/jobs?filter=generated&per_page=8&page=4', Argument::type('array'), Argument::any())->willReturn(resolve($response))->shouldBeCalled();
        $client = new Client($auth->reveal(), $browser->reveal());
        $result = await($client->operations()->actions()->listJobsForWorkflowRun('generated', 'generated', 6, 'generated', 8, 4));
    }
}
