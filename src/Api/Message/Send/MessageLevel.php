<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send;

class MessageLevel
{
    /** @var string 消息等级普通 */
    public const normal = 'normal';
    /** @var string 消息等级低 */
    public const low = 'low';
    /** @var string 消息等级高 */
    public const high = 'high';
}
