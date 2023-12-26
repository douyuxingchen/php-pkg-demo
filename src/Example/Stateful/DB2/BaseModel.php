<?php

namespace Douyuxingchen\PhpPkgDemo\Example\Stateful\DB2;

use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection;


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // 自定义配置数组
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
        $connection = $factory->make($config);

        // 方法1
        $this->connection = $connection;
        // 方法2
        // $this->setConnection($connection);
    }

    public function getConnection()
    {
        return $this->connection;
    }

}