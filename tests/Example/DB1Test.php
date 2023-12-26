<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\DB1\UsersModel;
use Tests\AbstractTestCase;

class DB1Test extends AbstractTestCase
{
    // ./vendor/bin/phpunit --filter testDB ./tests/Example/DB1Test.php
    public function testDB()
    {
        $result = UsersModel::query()->get();
        $this->assertNotNull($result);
    }

}