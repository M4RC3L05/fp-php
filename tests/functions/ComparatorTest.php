<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\comparator;


class ComparatorTest extends TestCase
{
    public function test_it_should_return_a_comparator_function()
    {
        $cf = comparator(function ($x, $y) {
            return $x < $y ? true : false;
        });

        $arr = [1, 4, 3, 6, 6, 7, 2, 4];
        $res = \usort($arr, $cf);
        $this->assertEquals([1, 2, 3, 4, 4, 6, 6, 7], $arr);
    }
}
        