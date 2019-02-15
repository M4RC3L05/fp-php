<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\thunkify;


class ThunkifyTest extends TestCase
{
    public function test_it_should_create_a_thunk()
    {
        $abc = thunkify(function ($x, $y) {
            return $x + $y;
        })(3, 4);

        $this->assertTrue(\is_callable($abc));
        $this->assertEquals(7, $abc());
    }
}
