<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class ClientsTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->authClient()->lists();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}