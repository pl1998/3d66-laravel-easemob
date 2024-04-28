<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;

use App\Helpers\Predis;
use Tepeng\LaravelEasemob\Enum\ApiEnum;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use LogicException;
class Authorization extends Api
{
    const APP_TOKEN_KEY = 'hx_app_token_key';
    const APP_TOKEN_TTL = 3600 * 10;


    /**
     * @return array
     * @throws Exception
     */
    public function getToken(): array
    {
        try {

            $appToken = Redis::get(self::APP_TOKEN_KEY);
            if(!empty($appToken)) {
                return unserialize($appToken);
            }

            $host = sprintf($this->getHost().ApiEnum::AUTHORIZATION_API,$this->config->host,$this->config->org_name,$this->config->app_name);
            $result = $this->post($host,[
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->config->client_id,
                'client_secret' => $this->config->client_secret,
                'ttl'           => self::APP_TOKEN_TTL,
            ],true,true);

            if(empty($result['access_token'])) {
                throw new LogicException('app token获取失败');
            }

            Redis::setex(self::APP_TOKEN_KEY,self::APP_TOKEN_TTL,serialize($result));

            return $result;
        }catch (Exception $e) {
            throw new $e;
        }
    }

    /**
     * 获取用户token
     * @param $userId
     * @return mixed|string
     * @throws Exception
     */
    public function getUserToken($userId)
    {
        $host = sprintf($this->getHost().ApiEnum::AUTHORIZATION_API,$this->config->host,$this->config->org_name,$this->config->app_name);
        $result = $this->post($host,[
            'grant_type'     => 'inherit',
            'username'       => $userId,
            'autoCreateUser' => true,
        ],true,true);

        if(empty($result['access_token'])) {
            Log::error('用户token获取失败：'.$userId.' '.json_encode($result,JSON_UNESCAPED_UNICODE));

            return '';
        }

        return $result['access_token'];
    }
}
