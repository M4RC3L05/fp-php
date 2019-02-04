<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\o;
use function FPPHP\Functions\curry;


class OTest extends TestCase
{
    public function test_it_should_compose_2_functions()
    {
        $this->assertEquals(60, o(
            curry(
                function ($x, $y) {
                    return $x * $y;
                }
            )(10),
            curry(
                function ($x, $y) {
                    return $x + $y;
                }
            )(10)
        )(-4));

        $this->assertEquals(6, o(
            curry(
                function ($x, $y) {
                    return $x + $y;
                }
            )(10)
        )(-4));

        $this->assertEquals(-4, o()(-4));
    }
}
        