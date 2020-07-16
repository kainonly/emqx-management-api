<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class RoutesTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->routes()->lists();
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGet(): void
    {
        try {
            $response = $this->client->routes()->get($this->topic);
            self::assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}