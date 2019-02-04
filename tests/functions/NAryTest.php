<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\nAry;


class NAryTest extends TestCase
{
    public function test_it_should_narity_a_function()
    {
        $fn = function ($x, $y, $z) {
            echo "{$x} -> {$y} -> {$z}";
        };

        $res = nAry(1)($fn);
        \ob_start();
        $res(10);
        $data = \ob_get_clean();
        $this->assertEquals("10 ->  -> ", $data);

        $res = nAry(2)($fn);
        \ob_start();
        $res(10)(3);
        $data = \ob_get_clean();
        $this->assertEquals("10 -> 3 -> ", $data);

        $res = nAry(3)($fn);
        \ob_start();
        $res(10)(3)(12);
        $data = \ob_get_clean();
        $this->assertEquals("10 -> 3 -> 12", $data);

        $res = nAry(4)($fn);
        \ob_start();
        $res(10)(3)(12)(1);
        $data = \ob_get_clean();
        $this->assertEquals("10 -> 3 -> 12", $data);

        $res = nAry(0)($fn);
        \ob_start();
        $res();
        $data = \ob_get_clean();
        $this->assertEquals(" ->  -> ", $data);
    }
}
        