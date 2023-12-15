<?php

namespace Douyuxingchen\PhpPkgDemo\Example\Stateless;

class Sms
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

    }

    public function send()
    {

    }

}