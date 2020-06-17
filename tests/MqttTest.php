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
            $option = new MqttPublishOption();
            $option->topic = 'notification/38b1367f-2c82-48a5-96ed-4f318febcbcf';
            $option->payload = 'hello';
            $response = $this->client->mqtt()->publish($option);
            $this->assertFalse($response->isError());
            $this->assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}