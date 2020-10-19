<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class AlarmsFactory extends Factory
{
    /**
     * 返回集群下当前告警信息
     * @return Response
     */
    public function lists(): Response
    {
        return $this->client->request(
            'GET',
            ['alarms']
        );
    }

    /**
     * 返回指定节点下的告警信息
     * @param string $node
     * @return Response
     */
    public function listsForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'alarms']
        );
    }

    /**
     * 返回集群下激活中的告警
     * @return Response
     */
    public function listsActivated(): Response
    {
        return $this->client->request(
            'GET',
            ['alarms', 'activated']
        );
    }

    /**
     * 返回指定节点下激活中的告警
     * @param string $node
     * @return Response
     */
    public function listsActivatedForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'alarms', 'activated']
        );
    }

    /**
     * 返回集群下已经取消的告警
     * @return Response
     */
    public function listsDeactivated(): Response
    {
        return $this->client->request(
            'GET',
            ['alarms', 'deactivated']
        );
    }

    /**
     * 返回指定节点下已经取消的告警
     * @param string $node
     * @return Response
     */
    public function listsDeactivatedForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'alarms', 'deactivated']
        );
    }

    /**
     * 取消指定告警
     * @param string $node 告警所在节点
     * @param string $name 告警名称
     * @return Response
     */
    public function deactivated(string $node, string $name): Response
    {
        return $this->client->request(
            'POST',
            ['alarms', 'deactivated'],
            null,
            [
                'node' => $node,
                'name' => $name
            ]
        );
    }

    /**
     * 清除所有已经取消的告警
     * @return Response
     */
    public function deleteAllDeactivated(): Response
    {
        return $this->client->request(
            'DELETE',
            ['alarms', 'deactivated'],
        );
    }

    /**
     * 清除指定节点下所有已经取消的告警
     * @param string $node
     * @return Response
     */
    public function deleteDeactivated(string $node): Response
    {
        return $this->client->request(
            'DELETE',
            ['nodes', $node, 'alarms', 'deactivated'],
        );
    }
}