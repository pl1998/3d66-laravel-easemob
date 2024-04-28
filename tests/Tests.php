<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Tests;

use Tepeng\LaravelEasemob\Api\Authorization;
use Tepeng\LaravelEasemob\Config;

class Tests extends \PHPUnit\Framework\TestCase
{

    /**
     * @return array
     */
    protected function getConfig() :array
    {
        return require __DIR__ . '/im.php';
    }

    /**
     * @var Config
     */
    public Config $config;
    public function getAppToken() :static
    {
        $configs = $this->getConfig();
        $this->config = (new Config($configs['super_community']));
        $result = (new Authorization($this->config))
            ->getToken();
        $this->config->setToken($result['access_token']);
        return $this;
    }
}
