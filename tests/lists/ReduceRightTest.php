<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;

use function FPPHP\Lists\reduceRight;


class ReduceRightTest extends TestCase
{
    public function test_it_should_right_reduce_over_an_array()
    {
        $arr = [1, 2, 3];
        $val = reduceRight(function ($acc, $curr) {
            return $acc + $curr;
        })(0)($arr);
        $this->assertEquals(6, $val);
    }
}
