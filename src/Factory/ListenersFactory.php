<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class ListenersFactory extends Factory
{
    /**
     * 返回集群下的所有监听器信息
     * @return Response
     */
    public function lists(): Response
    {
        return $this->client->request(
            'GET',
            ['listeners']
        );
    }

    /**
     * 返回指定节点的监听器信息
     * @param string $node
     * @return Response
     */
    public function listsForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'listeners']
        );
    }
}