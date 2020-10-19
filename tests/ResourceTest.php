<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class ResourceTest extends BaseTest
{
    public function testType(): void
    {
        try {
            $response = $this->client->resource()->type();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGet(): void
    {
        try {
            $response = $this->client->resource()->get();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testAdd(): ?string
    {
        try {
            $response = $this->client->resource()->add(
                'web_hook',
                [
                    'url' => 'http://127.0.0.1:9910',
                    'headers' => [
                        'token' => 'axfw34y235wrq234t4ersgw4t'
                    ],
                    'method' => 'POST'
                ]
            );
            self::assertFalse($response->isError(), $response->getMsg());
            return $response->getData()['id'];
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
            return null;
        }
    }

    /**
     * @param string $id
     * @depends testAdd
     */
    public function testDelete(string $id): void
    {
        try {
            $response = $this->client->resource()->delete($id);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

}