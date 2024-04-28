<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;

use Tepeng\LaravelEasemob\Enum\ApiEnum;
use Exception;
class Group extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function create(array $params) :array
    {
        $host = $this->getHost().ApiEnum::GROUP_CREATE;
        return $this->post($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function update(array $params) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::GROUP_UPDATE,
                $params['channel_category_id'],
            );
        return $this->put($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function updateChannel(array $params) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::GROUP_UPDATE_CHANNEL,$params['server_id'],$params['channel_category_id'],$params['channel_id']);

        return $this->post($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getGroupChannel(array $params) :array
    {
        //GET_GROUP_CHANNEL
        $host = $this->getHost().sprintf(ApiEnum::GET_GROUP_CHANNEL,
                $params['channel_category_id']
            );
        $params['serverId'] = $params['server_id'] ?? '';
        return $this->get($host,array_merge($params,$this->config->getConfig()));
    }
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getServerGroup(array $params) :array
    {

        $host = $this->getHost().ApiEnum::GET_SERVER_GROUP;
        $params['serverId'] = $params['server_id'] ?? '';
        return $this->get($host,array_merge($params,$this->config->getConfig()));
    }
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function delGroup(array $params) :array
    {
        $params['serverId'] = $params['server_id'] ?? '';
        $host = $this->getHost().sprintf(ApiEnum::DEL_SERVER_GROUP,$params['channel_category_id'])."?".http_build_query($params);
        return $this->delete($host,array_merge($params,$this->config->getConfig()));
    }
}
