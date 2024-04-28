<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob;

class Config
{
    /** @var string */
    public string $host;
    /** @var string */
    public string $org_name;
    /** @var string */
    public string $app_name;
    /** @var string|null  */
    public string|null $server_id;
    /** @var string|null  */
    public  string|null  $channel_id;
    /** @var int|null  */
    public  int|null  $user_id;
    /** @var int|null  */
    public  int|null  $rule;
    /** @var string|null  */
    public  string|null  $token;

    /** @var string|null  */
    public string|null $client_id;
    /** @var string|null  */
    public string|null $client_secret;

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->setHost((string)($config['host'] ?? ''));
        $this->setOrgName((string)($config['org_name'] ?? ''));
        $this->setAppName((string)($config['app_name'] ?? ''));
        $this->setServerId(($config['server_id'] ?? null));
        $this->setChannelId(($config['channel_id'] ?? null));
        $this->setUserId(($config['user_id'] ?? null));
        $this->setRule(($config['role'] ?? null));
        $this->setToken(($config['token'] ?? null));
        $this->setClientId(($config['client_id'] ?? null));
        $this->setClientSecret(($config['client_secret'] ?? null));
    }

    /**
     * @param string $host
     * @return $this
     */
    public function setHost(string $host) :Config
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setOrgName(string $name) :Config
    {
        $this->org_name = $name;
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setAppName(string $name):Config
    {
        $this->app_name = $name;
        return $this;
    }


    /**
     * @param string|null $serviceId
     * @return $this
     */
    public function setServerId(string|null $serviceId):Config
    {
        $this->server_id = $serviceId;
        return $this;
    }

    /**
     * @param int|null $channelId
     * @return $this
     */
    public function setChannelId(int|null $channelId):Config
    {
        $this->channel_id = $channelId;
        return $this;
    }


    /**
     * @param int|null $userId
     * @return $this
     */
    public function setUserId(int|null $userId):Config
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * @param int|null $role
     * @return $this
     */
    public function setRule(int|null $role):Config
    {
        $this->rule = $role;
        return $this;
    }

    /**
     * @param string|null $token
     * @return $this
     */
    public function setToken(string|null $token):Config
    {
        $this->token = $token;
        return $this;
    }

    /**
     *
     * @param string|null $clientId
     * @return $this
     */
    public function setClientId(string |null $clientId):Config
    {
        $this->client_id = $clientId;
        return $this;
    }

    public function setClientSecret(string |null $clientSecret):Config
    {
        $this->client_secret = $clientSecret;
        return $this;
    }

    /**
     * @return array
     */
    public function getConfig() :array
    {
        return null_filter(
            [
                'host'            => $this->host,
                'org_name'        => $this->org_name,
                'app_name'        => $this->app_name,
                'client_secret'   => $this->client_secret,
                'client_id'       => $this->client_id,
                'server_id'       => $this->server_id,
                'channel_id'      => $this->channel_id,
                'user_id'         => $this->user_id,
                'role'            => $this->rule,
                'token'           => $this->token,
            ]
        );
    }
}
