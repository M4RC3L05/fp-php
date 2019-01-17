<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\slice;


class SliceTest extends TestCase
{
    public function test_it_should_return_a_slice_of_an_array()
    {
        $arr = [1, 2, 3, 4, 5, 6];
        $res = slice(3)(2)($arr);
        $this->assertEquals([4, 5], $res);

        $arr = ["a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5, "f" => 6];
        $res = slice(3)(1)($arr);
        $this->assertEquals(["d" => 4], $res);
    }
}
