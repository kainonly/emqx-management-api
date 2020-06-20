<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class ClientsFactory extends Factory
{
    /**
     * 返回集群下所有客户端的信息，支持分页
     * @param int|null $page 页码
     * @param int|null $limit 每页显示的数据条数
     * @return Response
     */
    public function lists(?int $page = null, ?int $limit = null): Response
    {
        return $this->client->request(
            'GET',
            ['clients'],
            [
                'page' => $page,
                'limit' => $limit
            ]
        );
    }

    /**
     * 返回指定客户端的信息
     * @param string $clientid
     * @return Response
     */
    public function get(string $clientid): Response
    {
        return $this->client->request(
            'GET',
            ['clients', $clientid]
        );
    }
}