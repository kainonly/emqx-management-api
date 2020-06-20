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
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGet(): void
    {
        try {
            $response = $this->client->routes()->get($this->topic);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}