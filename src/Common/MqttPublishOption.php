<?php
declare(strict_types=1);

namespace EMQX\API\Common;

class MqttPublishOption
{
    /**
     * 主题，与 topics 至少指定其中之一
     * @var string
     */
    public string $topic;
    /**
     * 以 , 分割的多个主题，使用此字段能够同时发布消息到多个主题
     * @var string
     */
    public string $topics;
    /**
     * 客户端标识符
     * @var string
     */
    public string $clientid;
    /**
     * 消息正文
     * @var string
     */
    public string $payload;
    /**
     * 消息正文使用的编码方式，目前仅支持 plain 与 base64 两种
     * @var string
     */
    public string $encoding = 'plain';
    /**
     * QoS 等级
     * @var int
     */
    public int $qos = 0;
    /**
     * 是否为保留消息
     * @var bool
     */
    public bool $retain = false;
}