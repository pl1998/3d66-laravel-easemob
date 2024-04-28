<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send;

use Tepeng\LaravelEasemob\Api\Message\Send\Interface\ExtInterface;

class NewMsgExt implements ExtInterface
{
    /**
     * @return array
     */
    public function getData() :array
    {
        return [];
    }
}
