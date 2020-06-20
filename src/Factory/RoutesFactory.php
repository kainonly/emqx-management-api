<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class RoutesFactory extends Factory
{
    /**
     * 返回集群下的所有路由信息，支持分页机制
     * @param int|null $page 页码
     * @param int|null $limit 每页显示的数据条数
     * @return Response
     */
    public function lists(?int $page = null, ?int $limit = null): Response
    {
        return $this->client->request(
            'GET',
            ['routes'],
            [
                '_page' => $page,
                '_limit' => $limit
            ]
        );
    }

    /**
     * 返回集群下指定主题的路由信息
     * @param string $topic
     * @return Response
     */
    public function get(string $topic): Response
    {
        return $this->client->request(
            'GET',
            ['routes', $topic]
        );
    }
}