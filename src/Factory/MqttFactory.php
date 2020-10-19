<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\MqttPublishOption;
use EMQX\API\Common\Response;

class MqttFactory extends Factory
{
    /**
     * Publish a MQTT message
     * @param MqttPublishOption $option
     * @return Response
     */
    public function publish(MqttPublishOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'publish'],
            [],
            $option->getBody()
        );
    }

    /**
     * Batch publish MQTT messages
     * @param MqttPublishOption[] $options
     * @return Response
     */
    public function publishBatch(array $options): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'publish_batch'],
            [],
            array_map(static fn($v) => $v->getBody(), $options)
        );
    }

    /**
     * Subscribe a topic
     * @param array $topics 多个主题，使用此字段能够同时订阅多个主题
     * @param string $clientid 客户端标识符
     * @param int $qos QoS 等级
     * @return Response
     */
    public function subscribe(array $topics, string $clientid, int $qos = 0): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'subscribe'],
            [],
            [
                'topics' => implode(',', $topics),
                'clientid' => $clientid,
                'qos' => $qos
            ]
        );
    }

    /**
     * Batch subscribes topics
     * @param array $options
     * @return Response
     */
    public function subscribeBatch(array $options): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'subscribe_batch'],
            [],
            array_map(static fn($v) => [
                'topics' => implode(',', $v['topics']),
                'clientid' => $v['clientid'],
                'qos' => $v['qos'] ?? 0
            ], $options)
        );
    }

    /**
     * Unsubscribe a topic
     * @param string $topic 主题
     * @param string $clientid 客户端标识符
     * @return Response
     */
    public function unsubscribe(string $topic, string $clientid): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'unsubscribe'],
            [],
            [
                'topic' => $topic,
                'clientid' => $clientid
            ]
        );
    }

    /**
     * Batch unsubscribes topics
     * @param array $options
     * @return Response
     */
    public function unsubscribeBatch(array $options): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'unsubscribe_batch'],
            [],
            $options
        );
    }
}