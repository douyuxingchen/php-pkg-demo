<?php
namespace Douyuxingchen\PhpPkgDemo\Example\Stateless;

class Sms1
{
    private $appKey;
    private $appSecret;

    public function __construct(string $appKey, $appSecret)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
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
