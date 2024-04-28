<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message;

use Tepeng\LaravelEasemob\Api\Api;
use Tepeng\LaravelEasemob\Api\Message\Send\ChannelMessageBody;
use Tepeng\LaravelEasemob\Api\Message\Send\Interface\BodyInterface;
use Tepeng\LaravelEasemob\Enum\ApiEnum;
use Exception;

class ChannelMessage extends Api
{
    /**
     * 消息发送
     *
     * @param ChannelMessageBody $body
     * @return array
     * @throws Exception
     */
    public function send(BodyInterface $body) :array
    {
        try {
            $host = $this->getHost().ApiEnum::CHANNEL_MESSAGE_SEND;
            return $this->post($host,
                array_merge($body->getBody(),$this->config->getConfig()),
                true,
                true
            );
        }catch (Exception $e) {
            throw new $e;
        }
    }

    /**
     * @param string $msgId
     * @param ChannelMessageBody $body
     * @return array
     * @throws Exception
     */
    public function update(string $msgId,BodyInterface $body) :array
    {
        try {
            $host = $this->getHost().sprintf(ApiEnum::CHANNEL_MESSAGE_UPDATE,$msgId);
            return $this->put(
                $host, array_merge($body->getBody(),$this->config->getConfig()),
                true,
                true
            );
        }catch (Exception $e) {
            throw new $e;
        }
    }
}
