<?php
declare(strict_types=1);

namespace EMQX\API\Common;

interface HttpClientInterface
{
    /**
     * @param string $method
     * @param array $uri
     * @param array|object|null $body
     * @return Response
     */
    public function request(
        string $method,
        array $uri,
        $body = null
    ): Response;
}