<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\curryN;


class CurryNTest extends TestCase
{
    public function test_it_should_curry_up_to_n_args()
    {
        $fn = function (...$args) {
            return \array_sum($args);
        };
        $res = curryN(3)($fn);
        $this->assertEquals(6, $res(1)(2)(3));
    }
}
        