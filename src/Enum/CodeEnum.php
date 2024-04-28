<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Enum;

class CodeEnum
{
    /** @var int 操作成功 */
    public const SUCCESS_CODE = 200;

    /** @var int 用户已加入频道或社区 */
    public const USER_JOIN_OK = 51013;

    /** @var int 用户不在服务器中 */
    public const USER_NOT_SERVER = 51022;
}
