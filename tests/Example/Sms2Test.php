<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateless\Sms2;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\TestCase;
use Mockery;

class Sms2Test extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::shouldReceive('get')
            ->once()
            ->with('aliyun.appKey')
            ->andReturn(lib_env('SMS_APP_KEY'));

        Config::shouldReceive('get')
            ->once()
            ->with('aliyun.appSecret')
            ->andReturn(lib_env('SMS_APP_SECRET'));
    }

    // ./vendor/bin/phpunit --filter testSend ./tests/Example/Sms2Test.php
    public function testSend()
    {
        $res = (new Sms2())
            ->setTemplate('123456')
            ->send();
        var_dump($res);
        $this->assertTrue($res);
    }
}