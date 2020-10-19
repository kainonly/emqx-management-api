<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class TelemetryTest extends BaseTest
{
    public function testGetStatus(): void
    {
        try {
            $response = $this->client->telemetry()->getStatus();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testSetStatus(): void
    {
        try {
            $response = $this->client->telemetry()->setStatus(true);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testData(): void
    {
        try {
            $response = $this->client->telemetry()->data();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}