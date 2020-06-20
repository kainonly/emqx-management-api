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
     * @param array|null $query
     * @param array|null $body
     * @return Response
     * @noinspection PhpDocMissingThrowsInspection
     * @inheritDoc
     */
    public function request(
        string $method,
        array $uri,
        ?array $query = null,
        ?array $body = null
    ): Response
    {
        try {
            $uri = array_filter($uri, fn($v) => $v !== null);
            $options = [];
            if (!empty($query)) {
                $options['query'] = array_filter($query, fn($v) => $v !== null);
            }
            if (!empty($body)) {
                $options['json'] = array_filter($body, fn($v) => $v !== null);
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