<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\MqttPublishOption;
use EMQX\API\Common\MqttSubscribeOption;
use EMQX\API\Common\MqttUnsubscribeOption;
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
            $option
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
            $options
        );
    }

    /**
     * Subscribe a topic
     * @param MqttSubscribeOption $option
     * @return Response
     */
    public function subscribe(MqttSubscribeOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'subscribe'],
            $option
        );
    }

    /**
     * Unsubscribe a topic
     * @param MqttUnsubscribeOption $option
     * @return Response
     */
    public function unsubscribe(MqttUnsubscribeOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'unsubscribe'],
            $option
        );
    }

    /**
     * Batch subscribes topics
     * @param MqttSubscribeOption[] $options
     * @return Response
     */
    public function subscribeBatch(array $options): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'subscribe_batch'],
            $options
        );
    }

    /**
     * Batch unsubscribes topics
     * @param MqttUnsubscribeOption[] $options
     * @return Response
     */
    public function unsubscribeBatch(array $options): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'unsubscribe_batch'],
            $options
        );
    }
}