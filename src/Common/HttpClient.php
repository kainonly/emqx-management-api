<?php
declare(strict_types=1);

namespace EMQX\API\Common;

use Exception;
use GuzzleHttp\Client;

class HttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param array $uri
     * @param array|object|null $body
     * @return Response
     * @noinspection PhpDocMissingThrowsInspection
     * @inheritDoc
     */
    public function request(
        string $method,
        array $uri,
        $body = null
    ): Response
    {
        try {
            $uri = array_filter($uri, fn($v) => $v !== null);
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ];
            if (!empty($body)) {
                $options['body'] = json_encode($body);
            }
            /** @noinspection PhpUnhandledExceptionInspection */
            return Response::make(
                $this->client->request($method, implode('/', $uri), $options)
            );
        } catch (Exception $exception) {
            return Response::bad($exception->getMessage());
        }
    }
}