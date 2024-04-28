<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;

use Tepeng\LaravelEasemob\Enum\ApiEnum;
use Exception;

class Channel extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function create(array $params =[]): array
    {
        $host = $this->getHost().ApiEnum::CHANNEL_CREATE;
        return $this->post($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function update(array $params =[]) : array
    {
        $host = $this->getHost().sprintf(ApiEnum::CHANNEL_UPDATE,
                $params['channel_id'],
                $params['server_id'],
            );
        return $this->put($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function join(array $params) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::JOIN_CHANNEL,
                $params['channel_id'],
                $params['user_id'],
                $params['server_id'],
            );
        return $this->post($host,array_merge($params,$this->config->getConfig()));
    }


    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function deleteChannel(array $params) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::CHANNEL_DELETE,
                $params['channel_id'],
                $params['server_id'],
            );
        return $this->delete($host);
    }

    /**
     * 获取频道下面用户列表
     *
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function userList(array $params) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::CHANNEL_USER_LIST,$params['channel_id']);

        return $this->get($host,array_merge([
            'serverId' => $params['server_id'] ?? 0,
            'limit'    => $params['limit']     ?? 0,
            'cursor'   => $params['cursor']    ?? 0,
        ]));
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function removeChannelUser(array $params) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::CHANNEL_USER_REMOVE,
                $params['channel_id']
            );
        return $this->post($host,[
            'usernames' => $params['user_id'],
            'server_id' => $params['server_id']
        ]);
    }
}
