<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\juxt;


class JuxtTest extends TestCase
{
    public function test_it_should_map_a_list_of_functions_to_a_listof_values()
    {
        $res = juxt([function ($x, $y) {
            return $x + $y;
        }, function ($x, $y) {
            return $x * $y;
        }]);
        $this->assertEquals([3, 2], $res(1, 2, 3, 4));
    }
}
        