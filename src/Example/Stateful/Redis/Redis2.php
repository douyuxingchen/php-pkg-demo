<?php

namespace Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis;

use Illuminate\Support\Facades\Redis;

class Redis2
{
    private $redis;

    public function __construct()
    {
        $this->redis = Redis::connection('cache');
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