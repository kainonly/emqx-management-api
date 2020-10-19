<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class ListenersTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->listeners()->lists();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->listeners()->listsForNodes($this->node);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}