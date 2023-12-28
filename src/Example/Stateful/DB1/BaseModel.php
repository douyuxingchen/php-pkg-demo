<?php
namespace Douyuxingchen\PhpPkgDemo\Example\Stateful\DB1;

use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class BaseModel extends Model
{
    protected $connection;

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if(env('SDK')) {
            $connection = $this->createConnection();
        } else {
            $connection = Config::get('php_pkg.mysql');
        }
        $this->setConnection($connection);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function createConnection()
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

        // $this->connection = $connection;
    }
}