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
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->metrics()->listsForNodes($this->node);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsTopic(): void
    {
        try {
            $response = $this->client->metrics()->listsTopic();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetTopic(): void
    {
        try {
            $response = $this->client->metrics()->getTopic($this->topic);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testAddTopic(): void
    {
        try {
            $response = $this->client->metrics()->addTopic($this->topic);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeleteTopic(): void
    {
        try {
            $response = $this->client->metrics()->deleteTopic($this->topic);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeleteAllTopic(): void
    {
        try {
            $response = $this->client->metrics()->deleteAllTopic();
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}