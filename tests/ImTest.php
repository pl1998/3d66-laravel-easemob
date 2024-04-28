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
    public function testCreateServer()
    {
        $configs = require __DIR__ . '/config.php';

        $config = (new Config($configs['super_community']));
        $config->setToken('token');
        $result = (new Community($config))
            ->create([
                'owner' => 1,
                'name' => '测试社区',
                'type' => 0,
            ]);
        IF(isset($result['status']) && $result['status'] == 200) {
            $this->assertTrue(true);
            return;
        }
        $this->assertTrue(false);
    }
}
