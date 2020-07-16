<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class StatsTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->stats()->lists();
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->stats()->listsForNodes($this->node);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}