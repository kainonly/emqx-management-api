<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class AlarmsTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->alarms()->lists();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->alarms()->listsForNodes($this->node);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsActivated(): void
    {
        try {
            $response = $this->client->alarms()->listsActivated();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testlistsActivatedForNodes(): void
    {
        try {
            $response = $this->client->alarms()->listsActivatedForNodes($this->node);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsDeactivated(): void
    {
        try {
            $response = $this->client->alarms()->listsDeactivated();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsDeactivatedForNodes(): void
    {
        try {
            $response = $this->client->alarms()->listsDeactivatedForNodes($this->node);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeactivated(): void
    {
        try {
            $response = $this->client->alarms()->deactivated($this->node, "test");
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeleteDeactivated(): void
    {
        try {
            $response = $this->client->alarms()->deleteDeactivated($this->node);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeleteAllDeactivated(): void
    {
        try {
            $response = $this->client->alarms()->deleteAllDeactivated();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}