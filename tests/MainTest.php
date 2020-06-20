<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class MainTest extends BaseTest
{
    public function testGetEndpoints(): void
    {
        try {
            $response = $this->client->endpoints();
            $this->assertFalse($response->isError());
            $this->assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetBrokers(): void
    {
        try {
            $response = $this->client->brokers();
            $this->assertFalse($response->isError());
            $this->assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetBroker(): void
    {
        try {
            $response = $this->client->brokers();
            $this->assertFalse($response->isError());
            $this->assertNotEmpty($response->getData());
            $node = $response->getData()[0]['node'];
            $response = $this->client->brokers($node);
            $this->assertFalse($response->isError());
            $this->assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}