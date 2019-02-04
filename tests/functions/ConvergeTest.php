<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\converge;


class ConvergeTest extends TestCase
{
    public function test_it_should_converge_the_result_of_n_functions_to_a_single_function()
    {
        $res = converge(function ($x, $y) {
            return $x / $y;
        })([
            function ($arrNums) {
                return \array_sum($arrNums);
            },
            function ($arrNums) {
                return \count($arrNums);
            }
        ]);

        $avg = $res([13, 14, 12, 8, 14, 16, 17]);
        $this->assertEquals(13, (int)$avg);
    }
}
        