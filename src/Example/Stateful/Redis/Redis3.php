<?php
namespace Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis;

use Illuminate\Redis\RedisManager;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;

class Redis3
{
    private static $_instance;
    private $redis;

    public function __construct()
    {
        if(env('SDK')) {
            $this->redis = $this->createConnection();
        } else {
            $connection = Config::get('php_pkg.redis');
            $this->redis = Redis::connection($connection);
        }
    }

    private function createConnection()
    {
        $config = [
            'client' => 'predis',
            'default' => [
                'host' => lib_env('REDIS_HOST'),
                'port' => lib_env('REDIS_PORT'),
                'password' => lib_env('REDIS_PASSWORD'),
                'database' => lib_env('REDIS_DB', 0),
            ]
        ];
        $redisManager = new RedisManager(app(), 'predis', $config);
        $manager = $redisManager->resolve('default');
        return $manager->client();
    }

    public static function getInstance(): Redis3
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __call($method, $arguments)
    {
        return call_user_func_array([$this->redis, $method], $arguments);
    }

    private function __clone() {}

    private function __wakeup() {}
}
