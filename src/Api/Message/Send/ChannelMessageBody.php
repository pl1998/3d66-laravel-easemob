<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send;

use Tepeng\LaravelEasemob\Api\Message\Send\Interface\BodyInterface;
use Tepeng\LaravelEasemob\Enum\MessageTypeEnum;

class ChannelMessageBody extends Body implements BodyInterface
{
    /**
     * 发送消息方id 默认为admin用户
     *
     * @var string|null
     */
    protected string|null $from = null;

    /**
     * 需要发送到的群聊
     *
     * @var array
     */
    protected array $to = [];

    /**
     * 聊天室消息优先级
     *
     * @var ?string
     */
    protected ?string $chatroom_msg_level = null;

    /**
     * 消息类型
     *
     * @var ?string
     */
    protected ?string $type = MessageTypeEnum::TEXT;

    protected string|null $routeType = null;

    /**
     * 消息扩展字段 支持自定义消息
     *
     * @var array
     */
    protected array $ext  = [];


    /**
     * 消息内容
     *
     * @var string
     */
    protected string $msg  = '';



    /**
     * @param string $from
     * @return $this
     */
    public function from(string|int $from) :ChannelMessageBody
    {
        $this->from = (string)$from;
        return $this;
    }

    /**
     * @param array $channel
     * @return $this
     */
    public function to(array $channel= []) :ChannelMessageBody
    {
        $this->to = $channel;
        return $this;
    }

    /**
     * @param string $level
     * @return $this
     */
    public function setMsgLevel(string $level = MessageLevel::normal):ChannelMessageBody
    {
        $this->chatroom_msg_level = $level;
        return $this;
    }



    /**
     * @param string $type
     * @return $this
     */
    public function setRouteType(string $type):ChannelMessageBody
    {
        $this->routeType = $type;
        return $this;
    }

    /**
     * 发送消息
     *
     * @param string $message
     * @return $this
     */
    public function msg(string $message) :ChannelMessageBody
    {
        $this->body['msg'] = $message;
        return $this;
    }

    /**
     * 设置消息扩展字段
     *
     * @param MessageExt $ext
     * @return $this
     */
    public function ext(MessageExt $ext) :ChannelMessageBody
    {
        $this->ext = $ext->getData();
        return $this;
    }

    /**
     * @param string $event
     * @return $this
     */
    public function customEvent(string $event) :ChannelMessageBody
    {
        $this->body['customEvent'] = $event;
        return  $this;
    }



    /**
     * 获取消息请求体
     *
     * @return array
     */
    public function getBody() :array
    {
        return null_filter([
            'from'               => $this->from,
            'to'                 => $this->to,
            'chatroom_msg_level' => $this->chatroom_msg_level,
            'type'               => $this->type,
            'body'               => $this->body,
            'ext'                => empty($this->ext) ? null : $this->ext,
            'msg'                => empty($this->msg) ? null : $this->msg,
            'routetype'          => $this->routeType
        ]);
    }

}
