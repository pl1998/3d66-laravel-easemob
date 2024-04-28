<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Tests;

use Tepeng\LaravelEasemob\Api\Community;
use Illuminate\Contracts\Container\BindingResolutionException;
use Tepeng\LaravelEasemob\Config;

/**
 * 调用测试文件
 */
class ImTest extends Tests
{
    /**
     * 测试-创建服务器
     *
     * @return void
     * @throws BindingResolutionException
     */
//    public function testCreateServer()
//    {
//        $this->getAppToken();
//
//        $result = (new Community($this->config))
//            ->create([
//                'owner' => 1,
//                'name' => '测试社区',
//                'type' => 0,
//            ]);
//        if(isset($result['code']) && $result['code'] == 200) {
//            $this->assertTrue(true);
//            return;
//        }
//        $this->assertTrue(false);
//    }

    /**
     * 测试-更新服务器
     *
     * @return void
     * @throws BindingResolutionException
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
            var_dump($result);
            return;
        }
        $this->assertTrue(false);
    }

    /**
     * 测试-更新服务器
     *
     * @return void
     * @throws BindingResolutionException
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
        $this->assertTrue(false);
    }
}
