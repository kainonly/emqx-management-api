<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class AlarmsTest extends BaseTest
{
    public function testPresent(): void
    {
        try {
            $response = $this->client->alarms()->present($this->node);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testHistory(): void
    {
        try {
            $response = $this->client->alarms()->history($this->node);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}