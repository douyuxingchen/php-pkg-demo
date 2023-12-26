<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateless\Sms;
use PHPUnit\Framework\TestCase;

class SmsTest extends TestCase
{
    // ./vendor/bin/phpunit --filter testSend ./tests/Example/SmsTest.php
    public function testSend()
    {
        $appKey = lib_env('SMS_APP_KEY');
        $appSecret = lib_env('SMS_APP_SECRET');

        $res = (new Sms($appKey, $appSecret))
            ->setTemplate('123456')
            ->send();

        $this->assertTrue($res);
    }
}