<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class PluginsTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->plugins()->lists();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->plugins()->listsForNodes($this->node);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testLoad(): void
    {
        try {
            $response = $this->client->plugins()->load($this->node, 'emqx_auth_jwt');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testReload(): void
    {
        try {
            $response = $this->client->plugins()->reload($this->node, 'emqx_auth_jwt');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUnload(): void
    {
        try {
            $response = $this->client->plugins()->unload($this->node, 'emqx_auth_jwt');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}