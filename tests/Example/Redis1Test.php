<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis\Redis1;
use Illuminate\Redis\RedisManager;
use Tests\AbstractTestCase;

/**
 * 传递连接驱动
 */
class Redis1Test extends AbstractTestCase
{
    private $redis;

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
        $this->redis = $redisManager->resolve('default');
    }

    // ./vendor/bin/phpunit --filter testRedis ./tests/Example/Redis1Test.php
    public function testRedis()
    {
        $redisPass = new Redis1($this->redis->client());
        $redisPass->setUserName('6', 'xiaobai');
        $res = $redisPass->getUserName('6');
        $this->assertEquals('xiaobai', $res);
    }
}