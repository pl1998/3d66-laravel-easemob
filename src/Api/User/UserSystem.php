<?php

namespace Tepeng\LaravelEasemob\Api\User;

use Exception;
use Tepeng\LaravelEasemob\Api\Api;
use Tepeng\LaravelEasemob\Enum\UserEnum;
use Illuminate\Support\Arr;

class UserSystem extends Api
{
    /**
     * 授权注册单个用户
     * @param array $params
        [
            'username' => '3d66', 用户 ID，长度不可超过 64 字节
            'password' => '3d66' 用户的登录密码，长度不可超过 64 个字符
        ]
     * @return array
     * @throws Exception
     */
    public function authorizeRegister(array $params) :array
    {
        return $this->post(
            $this->getHost().'/users',
            array_merge($params,$this->config->getConfig()),
            false,
            true
        );
    }

    /**
     * 获取单个用户的详情
     * @param string $username 神策的用户ID
     * @return array
     * @throws Exception
     */
    public function userDetail(string $username) :array
    {
        return $this->post(
            $this->getHost().sprintf('/users/%s',$username),
            $this->config->getConfig(),
            false,
            true
        );
    }

    /**
     * 修改用户密码
     * @param string $username 神策的用户ID
     * @param string $newpassword
     * @return array
     * @throws Exception
     */
    public function editPassword(string $username,string $newpassword) :array
    {
        return $this->post(
            $this->getHost().sprintf('/users/%s/%s',$username,$newpassword),
            $this->config->getConfig(),
            false,
            true
        );
    }

    /**
     * 获取用户属性
     * @param string $username
     * @return mixed
     * @throws Exception
     */
    public function getUserAttr(string $username) :mixed
    {
        return $this->get($this->getHost().sprintf(UserEnum::USER_ATTR_HOST,$username),[],true);
    }

    /**
     * 编辑用户属性
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function editUserAttr(array $params) :array
    {
        return $this->put(
            $this->getHost().sprintf(UserEnum::USER_ATTR_HOST,$params['user_id']),
            Arr::only($params,['nickname','avatarurl','phone','mail','gender','sign','birth']),
            false,
            true,
            true
        );
    }

    /**
     * 删除用户
     * @param int $userId
     * @return array
     * @throws Exception
     */
    public function deleteUser(int $userId) :array
    {
        return $this->delete(
            $this->getHost().sprintf(UserEnum::USER_DELETE_HOST,$userId),
            [],
            false,
            true
        );
    }
}
