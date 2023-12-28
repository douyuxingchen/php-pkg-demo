<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis\Redis2;
use Mockery;
use Tests\AbstractTestCase;

class Redis2Test extends AbstractTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        // 模拟 Redis Facade 的行为
        $mockRedis = Mockery::mock('alias:Illuminate\Support\Facades\Redis');
        $mockRedis->shouldReceive('connection')
            ->with('cache')
            ->andReturnSelf();

        $mockRedis->shouldReceive('set')
            ->with('uid', 'xiaobai')
            ->andReturn('OK');
    }

    // ./vendor/bin/phpunit --filter testRedis ./tests/Example/Redis2Test.php
    public function testRedis()
    {
        $redisDefine = new Redis2();
        $result = $redisDefine->setUserName('uid', 'xiaobai');
        $this->assertEquals('OK', $result);
    }
}
