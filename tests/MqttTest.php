<?php
declare(strict_types=1);

namespace EMQXAPITests;

use EMQX\API\Common\MqttPublishOption;
use Exception;

class MqttTest extends BaseTest
{
    public function testPublish(): void
    {
        try {
            $option = new MqttPublishOption(
                ['notification/b2a22542-147a-4cad-b531-aa228c8c4279'],
                'hello'
            );
            $option->setEncoding('plain');
            $option->setQos(0);
            $option->setRetain(false);
            $response = $this->client->mqtt()->publish($option);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testPublishBatch(): void
    {
        try {
            $option = new MqttPublishOption(
                ['notification/b2a22542-147a-4cad-b531-aa228c8c4279'],
                'hello'
            );
            $option->setEncoding('plain');
            $option->setQos(0);
            $option->setRetain(false);
            $response = $this->client->mqtt()->publishBatch([$option]);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testSubscribe(): void
    {
        try {
            $response = $this->client->mqtt()->subscribe(
                ['notification'],
                'dev0'
            );
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testSubscribeBatch(): void
    {
        try {
            $response = $this->client->mqtt()->subscribeBatch([
                [
                    'topics' => ['notification'],
                    'clientid' => 'dev0'
                ]
            ]);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUnsubscribe(): void
    {
        try {
            $response = $this->client->mqtt()->unsubscribe(
                'notification',
                'dev0'
            );
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUnsubscribeBatch(): void
    {
        try {
            $response = $this->client->mqtt()->unsubscribeBatch([
                ['topic' => 'notification', 'clientid' => 'tests']
            ]);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}