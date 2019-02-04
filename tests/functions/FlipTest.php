<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\flip;


class FlipTest extends TestCase
{
    public function test_it_should_flip_the_first_2_args()
    {
        $fn = function ($x, $y) {
            return $x / $y;
        };

        $res = flip($fn)(1)(2);
        $this->assertEquals(2, $res);

        $res = flip($fn)(2)(1);
        $this->assertEquals(0.5, $res);

        $res = flip(function ($x, $y, $j) {
            return $x;
        })(2)(1)(3);
        $this->assertEquals(1, $res);
    }
}
        