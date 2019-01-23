<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\ap;


class ApTest extends TestCase
{
    public function test_it_should_apply_a_list_of_functions_to_a_list_of_values()
    {
        $add = function ($x) {
            return $x + 3;
        };
        $multiply = function ($x) {
            return $x * 2;
        };
        $res = ap([$add, $multiply])([1, 2, 3]);
        $this->assertEquals([4, 5, 6, 2, 4, 6], $res);
    }
}
