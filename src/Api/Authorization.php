<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;


use Illuminate\Support\Facades\Redis;
use Tepeng\LaravelEasemob\Enum\ApiEnum;
use Exception;
use LogicException;
class Authorization extends Api
{
    /** @var float|int  */
    protected const APP_TOKEN_TTL = 3600 * 10;
    /** @var string  */
    protected  const APP_TOKEN_KEY = 'im:app:token:key';
    /**
     * @return array
     * @throws Exception
     */
    public function getToken(array $config = []): array
    {
        try {
            if(empty($config)) {
                $config = config('im.super_community');
            }
            $result = Redis::get($config['app_token_key'] ?? self::APP_TOKEN_KEY);
            if($result) {
                return json_decode($result,true);
            }
            $host = sprintf($this->getHost().ApiEnum::AUTHORIZATION_API,$this->config->host,$this->config->org_name,$this->config->app_name);
            $result = $this->post($host,[
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->config->client_id,
                'client_secret' => $this->config->client_secret,
                'ttl'           => self::APP_TOKEN_TTL,
            ],false,true);

            if(empty($result['access_token'])) {
                throw new LogicException('app token获取失败');
            }
            Redis::setex($config['app_token_key'] ?? self::APP_TOKEN_KEY,$config['app_token_ttl'] ?? self::APP_TOKEN_TTL,
                json_encode($result,JSON_UNESCAPED_UNICODE)
            );
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
        ]);
        if(empty($result['access_token'])) {
            return '';
        }
        return $result['access_token'];
    }
}
