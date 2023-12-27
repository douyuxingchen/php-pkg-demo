<?php
namespace Tests\Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\DB2\DB;
use Tests\AbstractTestCase;

class DB2Test extends AbstractTestCase
{
    // ./vendor/bin/phpunit --filter testDB ./tests/Example/DB2Test.php
    public function testDB()
    {
        $res = DB::table('users')->get();
        $this->assertNotNull($res);
    }

}