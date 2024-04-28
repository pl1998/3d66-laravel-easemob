<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api;


use Tepeng\LaravelEasemob\Enum\ApiEnum;
use Exception;
use LogicException;
class Authorization extends Api
{
    const APP_TOKEN_TTL = 3600 * 10;
    /**
     * @return array
     * @throws Exception
     */
    public function getToken(): array
    {
        try {
            $fileName  = __DIR__.'/app_token.cache';
            if(!file_exists($fileName)) {
                touch($fileName);
            }
            $contents = file_get_contents($fileName);
            if(!empty($contents)) {
                $contents = unserialize($contents);
                if(time()<($contents['expiration'])) {
                    return $contents['data'];
                }
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
            file_put_contents($fileName,serialize([
                'data'       => $result,
                'expiration' => time()+(self::APP_TOKEN_TTL - 60)
            ]));
            return $result;
        }catch (Exception $e) {
            @unlink($fileName);
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
