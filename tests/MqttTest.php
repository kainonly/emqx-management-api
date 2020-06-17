<?php
declare(strict_types=1);

namespace EMQXAPITests;

use EMQX\API\Common\MqttPublishOption;
use EMQX\API\Common\MqttSubscribeOption;
use EMQX\API\Common\MqttUnsubscribeOption;
use Exception;

class MqttTest extends BaseTest
{

    public function testPublish(): void
    {
        try {
            $option = new MqttPublishOption();
            $option->topic = 'notification/38b1367f-2c82-48a5-96ed-4f318febcbcf';
            $option->payload = 'hello';
            $response = $this->client->mqtt()->publish($option);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testPublishBatch(): void
    {
        try {
            $option = new MqttPublishOption();
            $option->topic = 'notification/38b1367f-2c82-48a5-96ed-4f318febcbcf';
            $option->payload = 'hello';
            $response = $this->client->mqtt()->publishBatch([$option]);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testSubscribe(): void
    {
        try {
            $option = new MqttSubscribeOption();
            $option->topic = 'notification';
            $option->clientid = 'tests';
            $response = $this->client->mqtt()->subscribe($option);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testSubscribeBatch(): void
    {
        try {
            $option = new MqttSubscribeOption();
            $option->topic = 'notification';
            $option->clientid = 'tests';
            $response = $this->client->mqtt()->subscribeBatch([$option]);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUnsubscribe(): void
    {
        try {
            $option = new MqttUnsubscribeOption();
            $option->topic = 'notification';
            $option->clientid = 'tests';
            $response = $this->client->mqtt()->unsubscribe($option);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUnsubscribeBatch(): void
    {
        try {
            $option = new MqttUnsubscribeOption();
            $option->topic = 'notification';
            $option->clientid = 'tests';
            $response = $this->client->mqtt()->unsubscribeBatch([$option]);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}