<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class SubscriptionsFactory extends Factory
{
    /**
     * 返回集群下所有订阅信息，支持分页机制
     * @param int|null $page 页码
     * @param int|null $limit 每页显示的数据条数
     * @return Response
     */
    public function lists(?int $page = null, ?int $limit = null): Response
    {
        return $this->client->request(
            'GET',
            ['subscriptions'],
            [
                '_page' => $page,
                '_limit' => $limit
            ]
        );
    }

    /**
     * 返回集群下指定客户端的订阅信息
     * @param string $clientid
     * @return Response
     */
    public function get(string $clientid): Response
    {
        return $this->client->request(
            'GET',
            ['subscriptions', $clientid]
        );
    }

    /**
     * 返回指定节点下的所有订阅信息，支持分页机制
     * @param string $node
     * @param int|null $page
     * @param int|null $limit
     * @return Response
     */
    public function listForNodes(string $node, ?int $page = null, ?int $limit = null): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'subscriptions'],
            [
                '_page' => $page,
                '_limit' => $limit
            ]
        );
    }

    /**
     * 在指定节点下，查询某 clientid 的所有订阅信息，支持分页机制
     * @param string $node
     * @param string $clientid
     * @return Response
     */
    public function getForNodes(string $node, string $clientid): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'subscriptions', $clientid]
        );
    }

}