<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class ModulesTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client->modules()->lists();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testListsForNodes(): void
    {
        try {
            $response = $this->client->modules()->listsForNodes($this->node);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testLoad(): void
    {
        try {
            $response = $this->client->modules()->load('emqx_mod_delayed');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testReload(): void
    {
        try {
            $response = $this->client->modules()->reload('emqx_mod_acl_internal');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUnload(): void
    {
        try {
            $response = $this->client->modules()->unload('emqx_mod_delayed');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testLoadForNodes(): void
    {
        try {
            $response = $this->client->modules()->loadForNodes($this->node, 'emqx_mod_delayed');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUnloadForNodes(): void
    {
        try {
            $response = $this->client->modules()->unloadForNodes($this->node, 'emqx_mod_delayed');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testReloadForNodes(): void
    {
        try {
            $response = $this->client->modules()->reloadForNodes($this->node, 'emqx_mod_acl_internal');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}