<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\construct;

class ABC
{
    public function __construct($x, $y, $z)
    {
        echo "{$x} -> {$y} -> {$z}";
    }
}

class ConstructTest extends TestCase
{
    public function test_it_should_curry_a_contruct_function()
    {
        $res = construct(ABC::class)(1);
        $this->assertTrue(\is_callable($res));
        $res = $res(2);
        $this->assertTrue(\is_callable($res));
        \ob_start();
        $res1 = $res(3);
        $res2 = \ob_get_clean();
        $this->assertEquals("1 -> 2 -> 3", $res2);
        $this->assertTrue($res1 instanceof ABC);
    }
}
        