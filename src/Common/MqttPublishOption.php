<?php
declare(strict_types=1);

namespace EMQX\API\Common;

class MqttPublishOption
{
    /**
     * 以 , 分割的多个主题，使用此字段能够同时发布消息到多个主题
     * @var array
     */
    private array $topics;
    /**
     * 客户端标识符
     * @var string
     */
    private string $clientid;
    /**
     * 消息正文
     * @var string
     */
    private string $payload;
    /**
     * 消息正文使用的编码方式，目前仅支持 plain 与 base64 两种
     * @var string
     */
    private string $encoding = 'plain';
    /**
     * QoS 等级
     * @var int
     */
    private int $qos = 0;
    /**
     * 是否为保留消息
     * @var bool
     */
    private bool $retain = false;

    /**
     * MqttPublishOption constructor.
     * @param array $topics
     * @param string $payload
     */
    public function __construct(array $topics, string $payload)
    {
        $this->topics = $topics;
        $this->payload = $payload;
    }

    /**
     * @param string $clientid
     */
    public function setClientid(string $clientid): void
    {
        $this->clientid = $clientid;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }

    /**
     * @param int $qos
     */
    public function setQos(int $qos): void
    {
        $this->qos = $qos;
    }

    /**
     * @param bool $retain
     */
    public function setRetain(bool $retain): void
    {
        $this->retain = $retain;
    }

    /**
     * 返回参数
     * @return array
     */
    public function getBody(): array
    {
        return [
            'topics' => implode(',', $this->topics),
            'clientid' => $this->clientid ?? null,
            'payload' => $this->payload,
            'encoding' => $this->encoding,
            'qos' => $this->qos,
            'retain' => $this->retain
        ];
    }
}