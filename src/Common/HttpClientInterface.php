<?php
declare(strict_types=1);

namespace EMQX\API\Common;

interface HttpClientInterface
{
    /**
     * @param string $method
     * @param array $uri
     * @param array|null $query
     * @param array|null $body
     * @return Response
     */
    public function request(
        string $method,
        array $uri,
        ?array $query = null,
        ?array $body = null
    ): Response;
}