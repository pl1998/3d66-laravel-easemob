<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;

use Tepeng\LaravelEasemob\Enum\ApiEnum;
use Exception;


class Community extends Api
{
    /**
     *
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function create(array $params = []): array
    {
        $host = $this->getHost().ApiEnum::CIRCLE_CREATE;
        return $this->post($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     *
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function update($server_id,array $params = []): array
    {
        $host = $this->getHost().sprintf(ApiEnum::CIRCLE_UPDATE,$server_id);
        return $this->put($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     * @param int $userId
     * @return array
     * @throws Exception
     */
    public function isUser(int $userId): array
    {
        $host = $this->getHost().sprintf(ApiEnum::IS_CIRCLE_USER,$userId);
        return $this->get($host);
    }


    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function join(array $params) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::CIRCLE_JOIN,
                $params['server_id'],
                $params['user_id'],
            );
        return $this->post($host,array_merge($params,$this->config->getConfig()));
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function details(string $server_id) :array
    {
        $host = $this->getHost().sprintf(ApiEnum::CIRCLE_DETAILS,
                $server_id
            );
        return $this->get($host);
    }

}
