<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class NodesTest extends BaseTest
{
    public function testGetNodes(): void
    {
        try {
            $response = $this->client->nodes();
            self::assertFalse($response->isError());
            self::assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetNode(): void
    {
        try {
            $response = $this->client->nodes();
            self::assertFalse($response->isError());
            self::assertNotEmpty($response->getData());
            $node = $response->getData()[0]['node'];
            $response = $this->client->nodes($node);
            self::assertFalse($response->isError());
            self::assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}