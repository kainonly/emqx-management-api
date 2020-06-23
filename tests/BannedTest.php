<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class BannedTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->banned()->lists();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testAdd(): void
    {
        try {
            $response = $this->client->banned()->add('tester', 'username');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDelete(): void
    {
        try {
            $response = $this->client->banned()->delete('tester', 'username');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}