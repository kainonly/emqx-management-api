<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\HttpClientInterface;

abstract class Factory
{
    /**
     * @var HttpClientInterface
     */
    protected HttpClientInterface $client;

    /**
     * Factory constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
}