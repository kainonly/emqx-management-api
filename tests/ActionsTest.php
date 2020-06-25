<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class ActionsTest extends BaseTest
{
    public function testGet(): void
    {
        try {
            $response = $this->client->actions()->get('do_nothing');
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}