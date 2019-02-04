<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\call;


class CallTest extends TestCase
{
    public function test_it_should_call_a_function()
    {
        $fn = function ($x, $y) {
            return $x + $y;
        };

        $c = call($fn);
        $this->assertEquals(3, $c(1, 2));
    }
}
        