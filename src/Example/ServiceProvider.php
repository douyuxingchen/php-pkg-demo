<?php
namespace Douyuxingchen\PhpPkgDemo\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateless\Sms1;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Sms1::class, function(){
            $appKey = Config::get('php_pkg.appKey');
            $appSecret = Config::get('php_pkg.appSecret');
            return new Sms1($appKey, $appSecret);
        });

        $this->app->alias(Sms1::class, 'sms1');
    }

    public function provides()
    {
        return [Sms1::class, 'sms1'];
    }
}
