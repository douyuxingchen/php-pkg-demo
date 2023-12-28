<?php
namespace Douyuxingchen\PhpPkgDemo\Example\Stateful\DB2;

use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB as BaseDB;

class DB extends BaseDB
{
    protected static $connection;

    public static function table($table): Builder
    {
        $builder = new Builder(static::getConnection());
        return $builder->from($table);
    }

    protected static function getConnection()
    {
        if (!static::$connection) {

            if(env('SDK')) {
                static::$connection = self::createConnection();
            } else {
                $connect = Config::get('php_pkg.mysql');
                self::setDefaultConnection($connect);
                self::$connection = parent::getDefaultConnection();
            }

        }
        return static::$connection;
    }

    private static function createConnection()
    {
        $config = [
            'driver' => 'mysql',
            'host' => lib_env('DB_HOST'),
            'port' => lib_env('DB_PORT'),
            'database' => lib_env('DB_DATABASE'),
            'username' => lib_env('DB_USERNAME'),
            'password' => lib_env('DB_PASSWORD'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ];
        $factory = new ConnectionFactory(app());
        return $factory->make($config);
    }

}