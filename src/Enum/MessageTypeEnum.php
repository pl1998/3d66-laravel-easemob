<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Enum;

class MessageTypeEnum
{
    /** @var string 文本消息 */
    public const TEXT = 'txt';
    /** @var string  图片消息 */
    public const IMG = 'img';
    /** @var string 音频消息 */
    public const AUDIO = 'audio';
    /** @var string 视频消息 */
    public const VIDEO = 'video';
    /** @var string 文件消息 */
    public const FILE = 'file';
    /** @var string 位置消息 */
    public const LOC = 'loc';
    /** @var string 透传消息-用于APP */
    public const CMD = 'cmd';
    /** @var string 自定义消息  */
    public const CUSTOM  = 'custom';
}
