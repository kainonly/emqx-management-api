<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class ResourceFactory extends Factory
{
    /**
     * 查询规则引擎的资源类型
     * @param string|null $resource_type_name
     * @return Response
     */
    public function type(?string $resource_type_name = null): Response
    {
        return $this->client->request(
            'GET',
            ['resource_types', $resource_type_name]
        );
    }

    /**
     * 管理规则引擎的资源
     * @param string|null $resource_id
     * @return Response
     */
    public function get(?string $resource_id = null): Response
    {
        return $this->client->request(
            'GET',
            ['resources', $resource_id]
        );
    }

    /**
     * 创建规则，返回资源 ID
     * @param string $type
     * @param array $config
     * @param string|null $description
     * @return Response
     */
    public function add(string $type, array $config, ?string $description = null): Response
    {
        return $this->client->request(
            'POST',
            ['resources'],
            [],
            [
                'type' => $type,
                'config' => $config,
                'description' => $description
            ]
        );
    }

    /**
     * 删除资源
     * @param string $resource_id
     * @return Response
     */
    public function delete(string $resource_id): Response
    {
        return $this->client->request(
            'DELETE',
            ['resources', $resource_id]
        );
    }
}