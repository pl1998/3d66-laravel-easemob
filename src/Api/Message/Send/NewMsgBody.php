<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send;



use Tepeng\LaravelEasemob\Api\Message\Send\Interface\BodyInterface;

class NewMsgBody extends Body implements BodyInterface
{
    /**
     * 修改消息的用户
     *
     * @var string|null
     */
    protected string |null $user = null;

    /**
     * 修改后的消息
     *
     * @var array
     */
    protected array $new_msg = [];

    /**
     * 新消息内容扩展
     *
     * @var array
     */
    protected array $new_ext = [];

    /**
     * 消息内容是否替换
     *
     * @var bool
     */
    protected bool $is_combine_ext = false;

    /**
     * @param string $event
     * @return NewMsgBody
     */
    public function setMsgType(string $event) :NewMsgBody
    {
        $this->body['type'] = $event;
        return $this;
    }

    /**
     * 用户自定义的事件类型。该参数的值必须满足正则表达式
     *
     * @param string $event
     * @return $this
     */
    public function customEvent(string $event) :NewMsgBody
    {
        $this->body['customEvent'] = $event;
        return $this;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function user(string $user):NewMsgBody
    {
        $this->user = $user;
        return $this;
    }


    /**
     * 修改后的消息扩展信息与原有扩展信息是合并还是替换
     *
     * @param bool $bool
     * @return $this
     */
    public function isCombineExt(bool $bool) :NewMsgBody
    {
        $this->is_combine_ext = $bool;
        return $this;
    }

    /**
     * 修改后的消息扩展信息
     *
     * @param NewMsgExt $ext
     * @return $this
     */
    public function setNewMsgExt(NewMsgExt $ext):NewMsgBody
    {
        $this->new_ext = $ext->getData();
        return $this;
    }

    /**
     * @return array
     */
    public function getBody() :array
    {
        return null_filter([
            'user'           => $this->user,
            'new_msg'        => $this->body,
            'new_ext'        => empty($this->new_ext) ? null :$this->new_ext,
            'is_combine_ext' => $this->is_combine_ext
        ]);
    }

}
