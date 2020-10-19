<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class ClientsTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->clients()->lists();
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGet(): void
    {
        try {
            $response = $this->client->clients()->get($this->clientid);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->clients()->listsForNodes($this->node);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetForNodes(): void
    {
        try {
            $response = $this->client->clients()->getForNodes($this->node, $this->clientid);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsOfUsername(): void
    {
        try {
            $response = $this->client->clients()->listsOfUsername($this->key);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsOfUsernameForNodes(): void
    {
        try {
            $response = $this->client->clients()->listsOfUsernameForNode($this->node, $this->key);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testGetAclCache(): void
    {
        try {
            $response = $this->client->clients()->getAclCache($this->clientid);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDeleteAclCache(): void
    {
        try {
            $response = $this->client->clients()->deleteAclCache($this->clientid);
            self::assertFalse($response->isError(), $response->getMsg());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDelete(): void
    {
        try {
            $response = $this->client->clients()->delete($this->clientid);
            self::assertFalse($response->isError(), $response->getMsg());
            sleep(2);
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}