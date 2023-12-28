<?php
namespace Douyuxingchen\PhpPkgDemo\Example;

use Illuminate\Support\ServiceProvider;
use Exception;

// 引导发布应用程序
class ConfigProvider extends ServiceProvider
{
    /**
     * @throws Exception
     */
    public function boot()
    {
        $configPath = __DIR__ . '/config/php_pkg.php';
        if (!file_exists($configPath)) {
            throw new Exception("Error: Unable to find the configuration file: ".$configPath);
        }

        $this->publishes([
            $configPath => config_path('php_pkg.php'),
        ]);
    }
}