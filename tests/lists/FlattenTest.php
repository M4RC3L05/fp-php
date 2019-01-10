<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\flatten;


class FlattenTest extends TestCase
{
    public function test_it_should_flattern_and_array()
    {
        $arr = [1, 2, [3, 4], 5, [6, [7, 8, [9, [10, 11], 12]]]];
        $res = flatten($arr);

        $this->assertEquals([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], $res);

        $arr = ["a" => "a", "b" => ["c" => "c"], "d" => ["e" => ["f" => "f"]]];
        $res = flatten($arr);

        $this->assertEquals(["a" => "a", "c" => "c", "f" => "f"], $res);

        $arr = [];
        $res = flatten($arr);

        $this->assertEquals([], $res);
    }
}
