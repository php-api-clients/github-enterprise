<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterprise\Internal\Router\Get;

use ApiClients\Client\GitHubEnterprise\Internal;
use ApiClients\Client\GitHubEnterprise\Schema;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningAlert;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningAnalysis;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningDefaultSetup;
use ApiClients\Client\GitHubEnterprise\Schema\CodeScanningSarifsStatus;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class CodeScanning
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return iterable<int,Schema\CodeScanningAlertItems>|WithoutBody */
    public function listAlertsForRepo(array $params): iterable|WithoutBody
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('tool_name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_name');
        }

        $arguments['tool_name'] = $params['tool_name'];
        unset($params['tool_name']);
        if (array_key_exists('tool_guid', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_guid');
        }

        $arguments['tool_guid'] = $params['tool_guid'];
        unset($params['tool_guid']);
        if (array_key_exists('ref', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: ref');
        }

        $arguments['ref'] = $params['ref'];
        unset($params['ref']);
        if (array_key_exists('state', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: state');
        }

        $arguments['state'] = $params['state'];
        unset($params['state']);
        if (array_key_exists('severity', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: severity');
        }

        $arguments['severity'] = $params['severity'];
        unset($params['severity']);
        if (array_key_exists('page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: page');
        }

        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('per_page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: per_page');
        }

        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('direction', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: direction');
        }

        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: sort');
        }

        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        $operator = new Internal\Operator\CodeScanning\ListAlertsForRepo($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀CodeScanning🌀Alerts());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['tool_name'], $arguments['tool_guid'], $arguments['ref'], $arguments['state'], $arguments['severity'], $arguments['page'], $arguments['per_page'], $arguments['direction'], $arguments['sort']);
    }

    /** @return iterable<int,Schema\CodeScanningAnalysis> */
    public function listRecentAnalyses(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('tool_name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_name');
        }

        $arguments['tool_name'] = $params['tool_name'];
        unset($params['tool_name']);
        if (array_key_exists('tool_guid', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_guid');
        }

        $arguments['tool_guid'] = $params['tool_guid'];
        unset($params['tool_guid']);
        if (array_key_exists('ref', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: ref');
        }

        $arguments['ref'] = $params['ref'];
        unset($params['ref']);
        if (array_key_exists('sarif_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: sarif_id');
        }

        $arguments['sarif_id'] = $params['sarif_id'];
        unset($params['sarif_id']);
        if (array_key_exists('page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: page');
        }

        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('per_page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: per_page');
        }

        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('direction', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: direction');
        }

        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: sort');
        }

        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        $operator = new Internal\Operator\CodeScanning\ListRecentAnalyses($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀CodeScanning🌀Analyses());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['tool_name'], $arguments['tool_guid'], $arguments['ref'], $arguments['sarif_id'], $arguments['page'], $arguments['per_page'], $arguments['direction'], $arguments['sort']);
    }

    public function getDefaultSetup(array $params): CodeScanningDefaultSetup
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        $operator = new Internal\Operator\CodeScanning\GetDefaultSetup($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀CodeScanning🌀DefaultSetup());

        return $operator->call($arguments['owner'], $arguments['repo']);
    }

    /** @return iterable<int,Schema\CodeScanningOrganizationAlertItems> */
    public function listAlertsForEnterprise(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('tool_name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_name');
        }

        $arguments['tool_name'] = $params['tool_name'];
        unset($params['tool_name']);
        if (array_key_exists('tool_guid', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_guid');
        }

        $arguments['tool_guid'] = $params['tool_guid'];
        unset($params['tool_guid']);
        if (array_key_exists('before', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: before');
        }

        $arguments['before'] = $params['before'];
        unset($params['before']);
        if (array_key_exists('after', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: after');
        }

        $arguments['after'] = $params['after'];
        unset($params['after']);
        if (array_key_exists('state', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: state');
        }

        $arguments['state'] = $params['state'];
        unset($params['state']);
        if (array_key_exists('page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: page');
        }

        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('per_page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: per_page');
        }

        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('direction', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: direction');
        }

        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: sort');
        }

        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        $operator = new Internal\Operator\CodeScanning\ListAlertsForEnterprise($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Enterprises🌀Enterprise🌀CodeScanning🌀Alerts());

        return $operator->call($arguments['enterprise'], $arguments['tool_name'], $arguments['tool_guid'], $arguments['before'], $arguments['after'], $arguments['state'], $arguments['page'], $arguments['per_page'], $arguments['direction'], $arguments['sort']);
    }

    /** @return iterable<int,Schema\CodeScanningOrganizationAlertItems> */
    public function listAlertsForOrg(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('tool_name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_name');
        }

        $arguments['tool_name'] = $params['tool_name'];
        unset($params['tool_name']);
        if (array_key_exists('tool_guid', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: tool_guid');
        }

        $arguments['tool_guid'] = $params['tool_guid'];
        unset($params['tool_guid']);
        if (array_key_exists('before', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: before');
        }

        $arguments['before'] = $params['before'];
        unset($params['before']);
        if (array_key_exists('after', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: after');
        }

        $arguments['after'] = $params['after'];
        unset($params['after']);
        if (array_key_exists('state', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: state');
        }

        $arguments['state'] = $params['state'];
        unset($params['state']);
        if (array_key_exists('severity', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: severity');
        }

        $arguments['severity'] = $params['severity'];
        unset($params['severity']);
        if (array_key_exists('page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: page');
        }

        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('per_page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: per_page');
        }

        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        if (array_key_exists('direction', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: direction');
        }

        $arguments['direction'] = $params['direction'];
        unset($params['direction']);
        if (array_key_exists('sort', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: sort');
        }

        $arguments['sort'] = $params['sort'];
        unset($params['sort']);
        $operator = new Internal\Operator\CodeScanning\ListAlertsForOrg($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀CodeScanning🌀Alerts());

        return $operator->call($arguments['org'], $arguments['tool_name'], $arguments['tool_guid'], $arguments['before'], $arguments['after'], $arguments['state'], $arguments['severity'], $arguments['page'], $arguments['per_page'], $arguments['direction'], $arguments['sort']);
    }

    public function getAlert(array $params): CodeScanningAlert|WithoutBody
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('alert_number', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: alert_number');
        }

        $arguments['alert_number'] = $params['alert_number'];
        unset($params['alert_number']);
        $operator = new Internal\Operator\CodeScanning\GetAlert($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀CodeScanning🌀Alerts🌀AlertNumber());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['alert_number']);
    }

    public function getAnalysis(array $params): CodeScanningAnalysis
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('analysis_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: analysis_id');
        }

        $arguments['analysis_id'] = $params['analysis_id'];
        unset($params['analysis_id']);
        $operator = new Internal\Operator\CodeScanning\GetAnalysis($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀CodeScanning🌀Analyses🌀AnalysisId());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['analysis_id']);
    }

    public function getSarif(array $params): CodeScanningSarifsStatus|WithoutBody
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('sarif_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: sarif_id');
        }

        $arguments['sarif_id'] = $params['sarif_id'];
        unset($params['sarif_id']);
        $operator = new Internal\Operator\CodeScanning\GetSarif($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀CodeScanning🌀Sarifs🌀SarifId());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['sarif_id']);
    }

    /** @return iterable<int,Schema\CodeScanningAlertInstance> */
    public function listAlertInstances(array $params): iterable
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists('alert_number', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: alert_number');
        }

        $arguments['alert_number'] = $params['alert_number'];
        unset($params['alert_number']);
        if (array_key_exists('ref', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: ref');
        }

        $arguments['ref'] = $params['ref'];
        unset($params['ref']);
        if (array_key_exists('page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: page');
        }

        $arguments['page'] = $params['page'];
        unset($params['page']);
        if (array_key_exists('per_page', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: per_page');
        }

        $arguments['per_page'] = $params['per_page'];
        unset($params['per_page']);
        $operator = new Internal\Operator\CodeScanning\ListAlertInstances($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀CodeScanning🌀Alerts🌀AlertNumber🌀Instances());

        return $operator->call($arguments['owner'], $arguments['repo'], $arguments['alert_number'], $arguments['ref'], $arguments['page'], $arguments['per_page']);
    }
}
