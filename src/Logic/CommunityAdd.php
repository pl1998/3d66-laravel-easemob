<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Logic;

use Tepeng\LaravelEasemob\Api\Authorization;
use Tepeng\LaravelEasemob\Api\Channel;
use Tepeng\LaravelEasemob\Api\Community;
use Tepeng\LaravelEasemob\Config;
use Illuminate\Contracts\Container\BindingResolutionException;
class CommunityAdd
{

    /**
     * 将人添加到公共群组
     *
     * @param int $robotId
     * @param string $serverId
     * @param array $channel
     * @return void
     * @throws BindingResolutionException
     */
    public function handle( int $robotId, string $serverId, array $channel = []) :void
    {
        // 1.获取 App token
        $config   = app()->make(Config::class,['config' => config('im.super_community')]);
        $appToken = app()->make(Authorization::class,['config' => $config])->getToken();
        $config->setToken($appToken['access_token'] ?? '');
        // 2.将机器人加入到该社区
        app()->make(Community::class,['config' => $config])
            ->join([
                'server_id' => $serverId,
                'user_id'   => $robotId
            ]);
        // 3.将机器人加入到该频道
        foreach ($channel as $channelId) {
            app()->make(Channel::class,['config' => $config])
                ->join([
                    'server_id'  => $serverId,
                    'user_id'    => $robotId,
                    'channel_id' => $channelId
                ]);
        }
    }
}
