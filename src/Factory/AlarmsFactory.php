<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class AlarmsFactory extends Factory
{
    /**
     * 返回集群下当前告警信息
     * @param string $node
     * @return Response
     */
    public function present(?string $node = null): Response
    {
        return $this->client->request(
            'GET',
            ['alarms', 'present', $node]
        );
    }

    /**
     * 返回集群下历史告警信息
     * @param string|null $node
     * @return Response
     */
    public function history(?string $node = null): Response
    {
        return $this->client->request(
            'GET',
            ['alarms', 'history', $node]
        );
    }
}