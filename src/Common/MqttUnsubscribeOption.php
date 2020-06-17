<?php
declare(strict_types=1);

namespace EMQX\API\Common;

class MqttUnsubscribeOption
{
    /**
     * 主题，与 topics 至少指定其中之一
     * @var string
     */
    public string $topic;
    /**
     * 客户端标识符
     * @var string
     */
    public string $clientid;
}