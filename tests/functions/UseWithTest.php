<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\useWith;


class UseWithTest extends TestCase
{
    public function test_it_should_use_with()
    {
        $res = useWith(function ($x, $y) {
            return $x ** $y;
        })([function ($x) {
            return $x - 1;
        }, function ($x) {
            return $x + 1;
        }])(3)(4);
        $this->assertEquals(32, $res);
    }
}
