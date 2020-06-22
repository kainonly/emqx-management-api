<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class MetricsFactory extends Factory
{
    /**
     * 返回集群下所有统计指标数据
     * @return Response
     */
    public function lists(): Response
    {
        return $this->client->request(
            'GET',
            ['metrics']
        );
    }

    /**
     * 返回指定节点下所有监控指标数据
     * @param string $node
     * @return Response
     */
    public function listsForNodes(string $node): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node, 'metrics']
        );
    }

    /**
     * 返回所有主题统计指标数据
     * @return Response
     */
    public function listsTopic(): Response
    {
        return $this->client->request(
            'GET',
            ['topic-metrics']
        );
    }

    /**
     * 返回指定主题的统计指标数据
     * @param string $topic
     * @return Response
     */
    public function getTopic(string $topic): Response
    {
        return $this->client->request(
            'GET',
            ['topic-metrics', $topic]
        );
    }

    /**
     * 开启对指定主题的指标统计
     * @param string $topic
     * @return Response
     */
    public function addTopic(string $topic): Response
    {
        return $this->client->request(
            'POST',
            ['topic-metrics'],
            [],
            [
                'topic' => $topic
            ]
        );
    }

    /**
     * 关闭对指定主题的指标统计
     * @param string $topic
     * @return Response
     */
    public function deleteTopic(string $topic): Response
    {
        return $this->client->request(
            'DELETE',
            ['topic-metrics', $topic]
        );
    }

    /**
     * 关闭所有主题的指标统计
     * @return Response
     */
    public function deleteAllTopic(): Response
    {
        return $this->client->request(
            'DELETE',
            ['topic-metrics']
        );
    }

}