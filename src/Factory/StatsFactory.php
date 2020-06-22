<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class StatsFactory extends Factory
{
    /**
     * 返回集群下所有状态数据
     * @return Response
     */
    public function lists(): Response
    {
        return $this->client->request(
            'GET',
            ['stats']
        );
    }

    /**
     * 返回指定节点上的有状态数据
     * @param string $node
     * @return Response
     */
    public function listsForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'stats']
        );
    }
}