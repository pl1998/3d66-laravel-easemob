<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send;


abstract class Body
{

    /**
     * 消息内容
     *
     * @var array
     */
    protected array $body = [];

    /**
     * 消息类型
     *
     * @var ?string
     */
    protected string|null $type = null;

    /**
     * @param string $event
     * @return $this
     */
    public function setMsgType(string $event) :Body
    {
        $this->type = $event;
        return $this;
    }

    /**
     * 发送消息
     *
     * @param string $message
     * @return $this
     */
    public function msg(string $message) :Body
    {
        $this->body['msg'] = $message;
        return $this;
    }

    /**
     * @param CustomExt $ext
     * @return $this
     */
    public function customExts(CustomExt $ext):Body
    {
        $this->body['customExts'] = $ext->getData();
        return $this;
    }
}
