<?php
declare(strict_types=1);

namespace EMQXAPITests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use EMQX\API\EMQXClient;

abstract class BaseTest extends TestCase
{
    /**
     * @var string
     */
    protected string $uri;
    /**
     * @var string
     */
    protected string $appid;
    /**
     * @var string
     */
    protected string $appsecret;
    /**
     * @var EMQXClient
     */
    protected EMQXClient $client;
    /**
     * @var string
     */
    protected string $node;
    /**
     * @var string
     */
    protected string $topic;
    /**
     * @var string
     */
    protected string $key;
    /**
     * @var string
     */
    protected string $clientid;

    /**
     * setUp
     */
    public function setUp(): void
    {
        $this->uri = getenv('uri');
        $this->appid = getenv('appid');
        $this->appsecret = getenv('appsecret');
        $this->node = getenv('node');
        $this->topic = getenv('topic');
        $this->key = getenv('key');
        $this->clientid = getenv('clientid');
        $client = new Client([
            'base_uri' => $this->uri,
            'auth' => [$this->appid, $this->appsecret],
            'timeout' => 30.0,
            'debug' => false,
            'verify' => true,
            'version' => getenv('version') ? (float)getenv('version') : 1.1
        ]);
        $this->client = new EMQXClient($client);
    }
}