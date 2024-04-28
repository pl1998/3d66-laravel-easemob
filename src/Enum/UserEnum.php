<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Enum;

class UserEnum
{
    /** @var int 用户属性 https://{host}/{org_name}/{app_name}/metadata/user/{username} */
    public const USER_ATTR_HOST = '/metadata/user/%s';
    /** @var int 删除单个用户 https://{host}/{org_name}/{app_name}/users/{username} */
    public const USER_DELETE_HOST = '/users/%s';
}
