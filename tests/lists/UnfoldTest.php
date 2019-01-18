<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\unfold;


class UnfoldTest extends TestCase
{
    public function test_it_should_infold_to_arr_while_iteration_fn_returs_a_array_of_size_2()
    {
        $ifn = function ($x) {
            return $x > 60 ? false : [$x * 2, $x + 13];
        };
        $res = unfold($ifn)(1);
        $this->assertEquals([2, 28, 54, 80, 106], $res);

        $ifn = function ($x) {
            return false;
        };
        $res = unfold($ifn)(1);
        $this->assertEquals([], $res);
    }
}
