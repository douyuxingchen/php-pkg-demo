<?php
namespace Tests\Example;

use PHPUnit\Framework\TestCase;
use Tests\AbstractTestCase;

class VariableTest extends AbstractTestCase
{
    // ./vendor/bin/phpunit --filter testVar ./tests/Example/VariableTest.php
    public function testVar()
    {
        $this->assertEquals('local', env('APP_ENV'));
        $this->assertEquals('localhost', $_SERVER['HTTP_HOST']);
        $this->assertEquals('bar', $_POST['foo']);
        $this->assertEquals('bar', $_GET['foo']);
        $this->assertEquals('bar', $_REQUEST['foo']);
    }
}