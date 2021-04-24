<?php
declare(strict_types=1);

namespace EMQX\API\Common;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var array
     */
    private array $body = [];

    /**
     * @param ResponseInterface $response
     * @return static
     */
    public static function make(ResponseInterface $response): self
    {
        $self = new self();
        $contents = $response->getBody()->getContents();
        if (!empty($contents)) {
            $self->body = json_decode($contents, true);
        }
        return $self;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->body['code'] !== 0;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        switch ($this->body['code']) {
            case 0:
                return '成功';
            case 101:
                return 'RPC 错误';
            case 102:
                return '未知错误';
            case 103:
                return '用户名或密码错误';
            case 104:
                return '空用户名或密码';
            case 105:
                return '用户不存在';
            case 106:
                return '管理员账户不可删除';
            case 107:
                return '关键请求参数缺失';
            case 108:
                return '请求参数错误';
            case 109:
                return '请求参数不是合法 JSON 格式';
            case 110:
                return '插件已开启';
            case 111:
                return '插件已关闭';
            case 112:
                return '客户端不在线';
            case 113:
                return '用户已存在';
            case 114:
                return '旧密码错误';
            case 115:
                return '不合法的主题';
        }
        return '未知';
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function result(): array
    {
        return [
            'error' => $this->isError() ? 1 : 0,
            'data' => $this->getBody(),
            'msg' => $this->getMsg()
        ];
    }
}