<?php
declare(strict_types=1);

namespace EMQX\API\Common;

interface HttpClientInterface
{
    /**
     * @param string $method
     * @param array $uri
     * @param object $body
     * @return Response
     */
    public function request(
        string $method,
        array $uri,
        object $body = null
    ): Response;
}