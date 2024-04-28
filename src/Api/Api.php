<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;

use Tepeng\LaravelEasemob\Config;
use Tepeng\LaravelEasemob\Enum\ApiEnum;

class Api
{

    /**
     * 配置类
     *
     * @var Config
     */
    public Config $config;

    use RequestApi;
    /**
     * @return string
     */
    public function getHost() :string
    {
        return sprintf(ApiEnum::HOST,
            $this->config->host,
            $this->config->org_name,
            $this->config->app_name,
        );
    }

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

}
