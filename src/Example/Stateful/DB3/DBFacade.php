<?php
namespace Douyuxingchen\PhpPkgDemo\Example\Stateful\DB3;

use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Query\Builder;

class DBFacade
{
    protected static $connection;

    public static function table($table)
    {
        $builder = new Builder(static::getConnection());
        return $builder->from($table);
    }

    protected static function getConnection()
    {
        if (!static::$connection) {
            // 自定义连接配置
            $config = [
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'database' => 'test_db',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => false,
                'engine' => null,
            ];

            // 创建连接工厂
            $factory = new ConnectionFactory(app());

            // 创建自定义连接
            static::$connection = $factory->make($config);
        }

        return static::$connection;
    }

}