<?php

namespace Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis;

class Redis1
{
    private $redis;

    public function __construct($redis)
    {
        $this->redis = $redis;
    }

    public function setUserName($uid, $name)
    {
        return $this->redis->set($uid, $name);
    }

    public function getUserName($uid)
    {
        return $this->redis->get($uid);
    }
}