<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class RulesTest extends BaseTest
{
    public function testAdd(): ?string
    {
        try {
            $response = $this->client->rules()->add(
                'SELECT payload.msg as msg FROM "t/#" WHERE msg = "hello"',
                [
                    [
                        'name' => 'do_nothing',
                        'params' => []
                    ]
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
    public function testGet(string $id): void
    {
        try {
            $response = $this->client->rules()->get($id);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    /**
     * @param string $id
     * @depends testAdd
     */
    public function testUpdate(string $id): void
    {
        try {
            $response = $this->client->rules()->update(
                $id,
                'SELECT payload.msg as msg FROM "t/#" WHERE msg = "abc"',
                [
                    [
                        'name' => 'do_nothing',
                        'params' => []
                    ]
                ]
            );
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    /**
     * @param string $id
     * @depends testAdd
     */
    public function testDelete(string $id): void
    {
        try {
            $response = $this->client->rules()->delete($id);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}