<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis\Redis2;
use Illuminate\Redis\RedisManager;
use PHPUnit\Framework\TestCase;

class Redis3Test extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

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
        $r = $redisManager->resolve('default');

        app()->register('redis', $r);
    }

    // ./vendor/bin/phpunit --filter testRedisDefine ./tests/Example/RedisDefineTest.php
    public function testRedisDefine()
    {
        $redisPass = new Redis2();
        $redisPass->setUserName('6', 'xiaobai');
        $res = $redisPass->getUserName('6');
        $this->assertEquals('xiaobai', $res);
    }
}