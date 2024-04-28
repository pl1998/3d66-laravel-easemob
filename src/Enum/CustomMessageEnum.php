<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Enum;

/**
 * 自定义消息枚举
 */
class CustomMessageEnum
{
    /** @var string 绘画消息 */
    public const CUSTOM_EVENT_DRAWING  = 'custom_drawing_event';
    /** @var string 富文本消息 */
    public const CUSTOM_RICH_TEXT  = 'rich_text_event';
    /** @var string 训练消息 */
    public const TRAINING_EVENT  = 'training_event';
    /** @var string 训练文件不合格消息 */
    public const TRAINING_FILE_ERROR_EVENT  = 'training_file_error_event';
    /** @var string 绘画消息 */
    public const DRAWING_EVENT  = 'drawing_event';

}
