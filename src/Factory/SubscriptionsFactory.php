<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class SubscriptionsFactory extends Factory
{
    /**
     * 返回集群下所有订阅信息，支持分页机制
     * @param int $page 页码
     * @param int $limit 每页显示的数据条数
     * @param array $option 支持多条件和模糊查询
     * @return Response
     */
    public function lists(int $page = 1, int $limit = 10000, array $option = []): Response
    {
        return $this->client->request(
            'GET',
            ['subscriptions'],
            array_merge(
                [
                    '_page' => $page,
                    '_limit' => $limit
                ],
                $option
            )
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
     * @param int $page
     * @param int $limit
     * @return Response
     */
    public function listForNodes(string $node, int $page = 1, int $limit = 10000): Response
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