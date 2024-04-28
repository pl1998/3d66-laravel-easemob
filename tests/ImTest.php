<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Tests;

use Exception;
use Tepeng\LaravelEasemob\Api\Authorization;
use Tepeng\LaravelEasemob\Api\Community;
use Tepeng\LaravelEasemob\Api\User\UserSystem;


/**
 * 调用测试文件
 */
class ImTest extends Tests
{

    public function testPutUsers()
    {
        $this->getAppToken();

        $result = (new UserSystem($this->config))
            ->editUserAttr([
                'nickname'    => '178547911',
                'user_id'    => '178547911',
                'avatarurl'   =>'https://static.3d66.com/public/images/common/defaultHead.jpg',
                'gender'      => 0,
                'sign'        => '测试',
            ]);

        if(isset($result['data'])) {
            $this->assertTrue(true);
            return;
        }
        $this->fail();
    }
    public function testGetUsers()
    {
        $this->getAppToken();

        $result = (new UserSystem($this->config))
            ->userDetail('178547911');

        if(isset($result['entities'])) {
            $this->assertTrue(true);
            return;
        }
        $this->fail();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testAuthorizeRegister()
    {
        $this->getAppToken();

        $result = (new UserSystem($this->config))
            ->authorizeRegister([
                'username' => 24, 'password' => '24-'.'3d66'
            ]);
        if(isset($result['code']) && $result['code'] == 200) {
            $this->assertTrue(true);
            return;
        }
        $this->fail();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testCreateServer()
    {
        $this->getAppToken();

        $result = (new Community($this->config))
            ->create([
                'owner' => 1,
                'name' => '测试社区',
                'type' => 0,
            ]);
        if(isset($result['code']) && $result['code'] == 200) {
            $this->assertTrue(true);
            return;
        }
        $this->fail();
    }



    /**
     * @return void
     * @throws Exception
     */
    public function testUpdateServer()
    {
        $this->getAppToken();

        $result = (new Community($this->config))
            ->update('1d4cYfyprm6BmHfjGlsv8SS782s',[
                'name' => '测试社区2',
                'type' => 0,
                'description' => '描述'
            ]);

        if(isset($result['code']) && $result['code'] == 200) {
            $this->assertTrue(true);
            return;
        }
        $this->fail();
    }


    /**
     * @return void
     * @throws Exception
     */
    public function testGetServerInfo()
    {
        $this->getAppToken();

        $result = (new Community($this->config))
            ->details('1d4cYfyprm6BmHfjGlsv8SS782s');

        if(isset($result['code']) && $result['code'] == 200) {
            $this->assertTrue(true);
            return;
        }
        $this->fail();
    }
}
