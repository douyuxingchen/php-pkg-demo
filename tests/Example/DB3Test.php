<?php
namespace Example;

use Douyuxingchen\PhpPkgDemo\Example\Stateful\DB3\DBFacade;
use PHPUnit\Framework\TestCase;

class DB3Test extends TestCase
{
    // ./vendor/bin/phpunit --filter testDB ./tests/Example/DBFacadeTest.php
    public function testDB()
    {
        $res = DBFacade::table('users')->get();
        var_dump($res);
        $this->assertNotNull($res);
    }

}