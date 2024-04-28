<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send;

use Tepeng\LaravelEasemob\Api\Message\Send\Interface\ExtInterface;

class MessageExt implements ExtInterface
{
    /** @var string 自定义消息类型 */
    protected string $type = "";

    /** @var bool 静默消息 */
    protected bool $em_ignore_notification = false;
    /**
     * @param string $type
     * @return $this
     */
    public function type(string $type) :MessageExt
    {
        $this->type = $type;
        return $this;
    }

    /**
     * 设置消息是否静默消息
     *
     * @param bool $em_ignore_notification
     * @return $this
     */
    public function setIgnoreNotification(bool $em_ignore_notification) :MessageExt
    {
        $this->em_ignore_notification = $em_ignore_notification;
        return  $this;
    }

    /**
     * @return array
     */
    public function getData() :array
    {
        return  null_filter([
            'type'                   => $this->type,
            'em_ignore_notification' => $this->em_ignore_notification,
        ]);
    }
}
