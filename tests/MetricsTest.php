<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class MetricsTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->metrics()->lists();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testForNodes(): void
    {
        try {
            $response = $this->client->metrics()->listsForNodes($this->node);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsTopic(): void
    {
        try {
            $response = $this->client->metrics()->listsTopic();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetTopic(): void
    {
        try {
            $response = $this->client->metrics()->getTopic($this->topic);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testAddTopic(): void
    {
        try {
            $response = $this->client->metrics()->addTopic($this->topic);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeleteTopic(): void
    {
        try {
            $response = $this->client->metrics()->deleteTopic($this->topic);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeleteAllTopic(): void
    {
        try {
            $response = $this->client->metrics()->deleteAllTopic();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}