<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateless\Sms1;
use PHPUnit\Framework\TestCase;

class Sms1Test extends TestCase
{
    // ./vendor/bin/phpunit --filter testSend ./tests/Example/Sms1Test.php
    public function testSend()
    {
        $appKey = lib_env('SMS_APP_KEY');
        $appSecret = lib_env('SMS_APP_SECRET');

        $res = (new Sms1($appKey, $appSecret))
            ->setTemplate('123456')
            ->send();

        $this->assertTrue($res);
    }
}