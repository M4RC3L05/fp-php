<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\uncurryN;


class UncurryNTest extends TestCase
{
    public function test_it_should_uncurry_a_function_by_n()
    {
        $fn = function ($x) {
            return function ($y) use ($x) {
                return function ($z) use ($y, $x) {
                    return function ($a) use ($z, $y, $x) {
                        return $x + $y + $z + $a;
                    };
                };
            };
        };

        $res = uncurryN(4)($fn);
        $this->assertTrue(\is_callable($res));

        $r = $res(1, 2, 3, 4, 5);
        $this->assertEquals(10, $r);

        $r = $res(1, 2, 3, 4);
        $this->assertEquals(10, $r);
    }
}
