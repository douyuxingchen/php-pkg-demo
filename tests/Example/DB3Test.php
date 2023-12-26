<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\DB3\DB;
use Tests\AbstractTestCase;

class DB3Test extends AbstractTestCase
{
    // ./vendor/bin/phpunit --filter testDB ./tests/Example/DB3Test.php
    public function testDB()
    {
        $res = DB::table('users')->get();
        var_dump($res);
        $this->assertNotNull($res);
    }

}