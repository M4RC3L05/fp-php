<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\scan;


class ScanTest extends TestCase
{
    public function test_it_should_reduce_to_a_list()
    {
        $arr = [1, 2, 3, 4];
        $res = scan(function ($x, $y) {
            return $x * $y;
        })(1)($arr);
        $this->assertEquals([1, 1, 2, 6, 24], $res);

        $arr = [];
        $res = scan(function ($x, $y) {
            return $x * $y;
        })(1)($arr);
        $this->assertEquals([1], $res);

        $arr = ["a" => 1, "b" => 2];
        $res = scan(function ($x, $y) {
            return $x * $y;
        })(1)($arr);
        $this->assertEquals([1, 1, 2], $res);
    }
}
