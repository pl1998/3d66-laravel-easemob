<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Message\Send\Interface;

interface BodyInterface
{
    /**
     * 返回内容
     *
     * @return array
     */
    public function getBody() :array;
}
