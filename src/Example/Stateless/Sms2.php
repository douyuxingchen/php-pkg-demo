<?php
namespace Douyuxingchen\PhpPkgDemo\Example\Stateless;

use Illuminate\Support\Facades\Config;

class Sms2
{
    private $appKey;
    private $appSecret;

    public function __construct()
    {
        $this->appKey = Config::get('aliyun.appKey');
        $this->appSecret = Config::get('aliyun.appSecret');
    }

    public function setTemplate(string $template)
    {
        // 执行 set 等等操作
        return $this;
    }

    public function send()
    {
        // 执行短信发送逻辑
        echo '短信发送成功';
        return true;
    }

}