<?php
declare(strict_types=1);

namespace EMQXAPITests;

use Exception;

class DataTest extends BaseTest
{
    public function testGetExport(): void
    {
        try {
            $response = $this->client->data()->getExport();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testAddExport(): void
    {
        try {
            $response = $this->client->data()->addExport();
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testImpoty(): void
    {
        try {
            $response = $this->client->data()->getExport();
            $this->assertFalse($response->isError());
            $filename = $response->getData()[0]['filename'];
            $response = $this->client->data()->import($filename);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDownload(): void
    {
        try {
            $response = $this->client->data()->getExport();
            $this->assertFalse($response->isError());
            $filename = $response->getData()[0]['filename'];
            $response = $this->client->data()->download($filename);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testUpload(): void
    {
        try {
            $response = $this->client->data()->getExport();
            $this->assertFalse($response->isError());
            $filename = $response->getData()[0]['filename'];
            $response = $this->client->data()->download($filename);
            $this->assertFalse($response->isError());
            $data = $response->getData();
            $response = $this->client->data()->upload($data['filename'], $data['file']);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testDelete(): void
    {
        try {
            $response = $this->client->data()->getExport();
            $this->assertFalse($response->isError());
            $filename = $response->getData()[0]['filename'];
            $response = $this->client->data()->delete($filename);
            $this->assertFalse($response->isError());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}