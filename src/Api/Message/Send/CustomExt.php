<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send;

class CustomExt
{

    /**
     * 该自定义消息是否完成
     *
     * @var bool
     */
    protected null|bool $finish=null;
    /**
     *
     * 任务进度 单位秒
     * @var int|null
     */
    protected int|null $schedule = null;

    /**
     * 艾特人信息
     *
     * @var array|null
     */
    protected ?array $at = [];

    /**
     * 绘画进度图片
     *
     * @var array
     */
    protected array $img = [];

    /**
     * @var array
     */
    protected array $training = [];

    /**
     * @var array
     */
    protected array $workInfo = [];

    /**
     * @var array
     */
    protected array|null $modeList = [];

    /**
     * @var string
     */
    protected string $userMessage = '';

    /** @var bool  */
    protected bool $download = true;

    /**
     * @var string
     */
    protected string $serverId = '';

    /**
     * @param string $schedule
     * @return $this
     */
    public function serverId(string $serverId) :CustomExt
    {
        $this->serverId = $serverId;
        return $this;
    }

    /**
     * @param int $schedule
     * @return $this
     */
    public function schedule(int $schedule) :CustomExt
    {
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * 设置完成图片
     *
     * @param array $array
     * @return $this
     */
    public function setImg(array $array):CustomExt
    {
        $this->img = $array;
        return $this;
    }

    /**
     * @param bool $finish
     * @return $this
     */
    public function setFinish( bool $finish ):CustomExt
    {
        $this->finish = $finish;
        return $this;
    }

    public function download( bool $download ):CustomExt
    {
        $this->download = $download;
        return $this;
    }

    /**
     * 自定义消息体的内容
     *
     * @var string
     */
    protected string $message = 'Custom Message';

    public function message(string $message) :CustomExt
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param array|null $modeList
     * @return $this
     */
    public function modeList(array|null $modeList) :CustomExt
    {
        $this->modeList = $modeList;
        return $this;
    }

    /**
     * 艾特人 多个人则多个数组
     *
     * @param array $user //['userId' => $userId, 'nickname' => $nickname, 'avatar' => '']
     * @return CustomExt
     */
    public function at(array $user = []) :CustomExt
    {
        $this->at = $user;
        return  $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function training(array $data = []) :CustomExt
    {
        $this->training = $data;
        return $this;
    }

    /**
     * 训练参数
     * @param array $data
     * @return $this
     */
    public function workInfo(array $data = []) :CustomExt
    {
        $this->workInfo = $data;
        return $this;
    }

    /**
     * 用户消息
     * @param string $message
     * @return $this
     */
    public function userMessage(string $userMessage)
    {
        $this->userMessage = $userMessage;
        return $this;
    }

    /**
     * @return array
     */
    public function getData() :array
    {
        return null_filter([
            'msg'          => $this->message,
            'server_id'    => $this->serverId,
            'finish'       => $this->finish,
            'img'          => $this->img,
            'schedule'     => $this->schedule,
            'at'           => empty($this->at) ? null :$this->at,
            'training'     => empty($this->training) ? null :$this->training,
            'work_info'    => empty($this->workInfo) ? null :$this->workInfo,
            'user_message' => empty($this->userMessage) ? null :$this->userMessage,
            'model_list'   => empty($this->modeList) ? null :$this->modeList,
            'download'     => $this->download
        ]);
    }
}
