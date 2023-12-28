<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis\Redis1;
use Douyuxingchen\PhpPkgDemo\Example\Stateful\Redis\Redis3;
use Illuminate\Redis\RedisManager;
use Tests\AbstractTestCase;

class Redis3Test extends AbstractTestCase
{
    // ./vendor/bin/phpunit --filter testRedis ./tests/Example/Redis3Test.php
    public function testRedis()
    {
        Redis3::getInstance()->set('6', 'xiaobai');
        $res = Redis3::getInstance()->get('6');
        $this->assertEquals('xiaobai', $res);
    }
}
