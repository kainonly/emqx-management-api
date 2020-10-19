<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class TelemetryFactory extends Factory
{
    /**
     * 查询数据遥测功能是否启用
     * @return Response
     */
    public function getStatus(): Response
    {
        return $this->client->request(
            'GET',
            ['telemetry', 'status']
        );
    }

    /**
     * 启用或关闭数据遥测功能
     * @param bool $enabled 是否启用
     * @return Response
     */
    public function setStatus(bool $enabled): Response
    {
        return $this->client->request(
            'PUT',
            ['telemetry', 'status'],
            null,
            [
                'enabled' => $enabled
            ]
        );
    }

    /**
     * 获取数据遥测功能上报的数据内容
     * @return Response
     */
    public function data(): Response
    {
        return $this->client->request(
            'GET',
            ['telemetry', 'data']
        );
    }
}