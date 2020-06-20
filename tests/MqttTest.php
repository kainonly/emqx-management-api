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
            $topic = $this->topic . '/' . $this->key;
            $option = new MqttPublishOption(
                [$topic],
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
            $topic = $this->topic . '/' . $this->key;
            $option = new MqttPublishOption(
                [$topic],
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
                [$this->topic],
                $this->clientid
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
                    'topics' => [$this->topic],
                    'clientid' => $this->clientid
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
                $this->topic,
                $this->clientid
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
                ['topic' => $this->topic, 'clientid' => $this->clientid]
            ]);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}