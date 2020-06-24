<?php
declare(strict_types=1);

namespace EMQX\API\Common;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var bool
     */
    private bool $error;
    /**
     * @var string
     */
    private string $msg;
    /**
     * @var array
     */
    private array $data;

    /**
     * @param ResponseInterface $response
     * @return static
     */
    public static function make(ResponseInterface $response): self
    {
        $self = new self();
        $raw = $response->getBody()->getContents();
        $data = !empty($raw) ? json_decode($raw, true) : [];
        $self->error = isset($data['code']) ? $data['code'] !== 0 : empty($data);
        $self->data = $data['data'] ?? $data;
        $self->msg = $self->error ? (string)$data['code'] : 'ok';
        return $self;
    }

    /**
     * @param string $reason
     * @return static
     */
    public static function bad(string $reason): self
    {
        $self = new self();
        $self->error = true;
        $self->msg = $reason;
        $self->data = [];
        return $self;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function result(): array
    {
        return $this->error ? [
            'error' => 1,
            'msg' => $this->msg
        ] : [
            'error' => 0,
            'msg' => $this->msg,
            'data' => $this->data
        ];
    }
}