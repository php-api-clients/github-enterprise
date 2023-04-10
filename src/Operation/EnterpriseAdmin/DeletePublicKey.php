<?php

declare (strict_types=1);
namespace ApiClients\Client\Github\Operation\EnterpriseAdmin;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
final class DeletePublicKey
{
    public const OPERATION_ID = 'enterprise-admin/delete-public-key';
    public const OPERATION_MATCH = 'DELETE /admin/keys/{key_ids}';
    private const METHOD = 'DELETE';
    private const PATH = '/admin/keys/{key_ids}';
    /**The unique identifier of the key.**/
    private string $keyIds;
    public function __construct(string $keyIds)
    {
        $this->keyIds = $keyIds;
    }
    public function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{key_ids}'), array($this->keyIds), self::PATH));
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Psr\Http\Message\ResponseInterface
    {
        return $response;
    }
}
