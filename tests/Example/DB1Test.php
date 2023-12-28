<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\DB1\UsersModel;
use Tests\AbstractTestCase;
use Mockery;

class DB1Test extends AbstractTestCase
{
    // ./vendor/bin/phpunit --filter testDB ./tests/Example/DB1Test.php
    public function testDB()
    {
        $result = UsersModel::query()->get();
        $this->assertNotNull($result);
    }


    //    public function setUp(): void
//    {
//        parent::setUp();
//
//        $config = [
//            'driver' => 'mysql',
//            'host' => lib_env('DB_HOST'),
//            'port' => lib_env('DB_PORT'),
//            'database' => lib_env('DB_DATABASE'),
//            'username' => lib_env('DB_USERNAME'),
//            'password' => lib_env('DB_PASSWORD'),
//            'charset' => 'utf8mb4',
//            'collation' => 'utf8mb4_unicode_ci',
//            'prefix' => '',
//            'strict' => false,
//            'engine' => null,
//        ];
//
//        Config::shouldReceive('get')
//            ->once()
//            ->with('entrust.role')
//            ->andReturn($config);
//    }


    // ./vendor/bin/phpunit --filter testDB ./tests/Example/DB1Test.php
//    public function testDB()
//    {
//         // 创建模拟的数据库连接
//        $connection = Mockery::mock(Connection::class);
//        $connection->shouldReceive('table')->andReturnUsing(function ($table) use ($connection) {
//            $builder = Mockery::mock(Builder::class);
//            $builder->shouldReceive('get')->andReturn(['mocked_data']); // 返回模拟的数据
//            $builder->shouldReceive('getConnection')->andReturn($connection);
//            return $builder;
//        });
//
//        // 创建模拟的连接工厂
//        $factory = Mockery::mock(ConnectionFactory::class);
//        $factory->shouldReceive('make')->andReturn($connection);
//
//        // 创建 UsersModel 实例
//        $usersModel = new UsersModel();
//        $usersModel->setConnectionResolver($factory); // 设置连接工厂
//
//        // 测试查询方法
//        $result = $usersModel->query()->get()->toArray();
//
//        // 断言是否成功获取到数据
//        $this->assertNotNull($result);
//        $this->assertEquals(['mocked_data'], $result);
//
//    }

}