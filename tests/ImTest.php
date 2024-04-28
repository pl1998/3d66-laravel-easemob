<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Tests;

use Exception;
use Tepeng\LaravelEasemob\Api\Community;


/**
 * 调用测试文件
 */
class ImTest extends Tests
{

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
