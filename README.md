# EMQ X Management Api

EMQX Management HTTP API

## Setup

```shell
composer require kain/emqx-management-api
```

## Quick Start

Create emqx client

```php
$emqx = \EMQX\API\EMQXClient::create(
    'http://localhost:8081/api/v4/',
    '<your appid>',
    '<your appsecret>'
);

$response = $emqx->endpoints();
if ($response->isError()) {
    echo $response->getMsg();
    return;
}

var_dump($response->result());
```

Or custom client

```php
$client = new \GuzzleHttp\Client([
    'base_uri' => 'http://localhost:8081/api/v4/',
    'auth' => ['<your appid>', '<your appsecret>'],
    'timeout' => 30.0,
    'debug' => false,
    'verify' => false,
    'version' => 1.1
]);

$emqx = new \EMQX\API\EMQXClient($client);

$response = $emqx->endpoints();
if ($response->isError()) {
    echo $response->getMsg();
    return;
}

var_dump($response->result());
```

Publish Message

```php
$option = new \EMQX\API\Common\MqttPublishOption(
    ['notification'],
    'hello'
);
$option->setEncoding('plain');
$option->setQos(0);
$option->setRetain(false);
$response = $emqx->mqtt()->publish($option);

if ($response->isError()) {
    echo $response->getMsg();
    return;
}
var_dump($response->result());
```

Function calls are basically the same as the official API, https://docs.emqx.io/broker/latest/en/advanced/http-api.html