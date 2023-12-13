<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    // ./vendor/bin/phpunit --filter testExample ./tests/Unit/ExampleTest.php
    public function testExample()
    {
        $sum = 1 + 1;
        $this->assertEquals(2, $sum);
    }
}