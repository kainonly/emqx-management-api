<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class SubscriptionsTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->subscriptions()->lists();
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGet(): void
    {
        try {
            $response = $this->client->subscriptions()->get($this->clientid);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->subscriptions()->listForNodes($this->node);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetForNodes(): void
    {
        try {
            $response = $this->client->subscriptions()->getForNodes($this->node, $this->clientid);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

}