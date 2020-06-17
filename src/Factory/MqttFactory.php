<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\MqttPublishOption;
use EMQX\API\Common\MqttSubscribeOption;
use EMQX\API\Common\Response;

class MqttFactory extends Factory
{
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
     * Unsubscribe a topic
     * @return Response
     */
    public function unsubscribe(): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'unsubscribe']
        );
    }

    /**
     * Batch subscribes topics
     * @return Response
     */
    public function subscribe_batch(): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'subscribe_batch']
        );
    }

    /**
     * Batch publish MQTT messages
     * @return Response
     */
    public function publish_batch(): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'publish_batch']
        );
    }

    /**
     * Batch unsubscribes topics
     * @return Response
     */
    public function unsubscribe_batch(): Response
    {
        return $this->client->request(
            'POST',
            ['mqtt', 'unsubscribe_batch']
        );
    }
}