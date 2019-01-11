<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\groupWith;


class GroupWithTest extends TestCase
{
    public function test_it_should_group_griven_an_perdicate()
    {
        $arr = [0, 1, 1, 2, 3, 5, 8, 13, 21];
        $res = groupWith(function ($x, $y) {
            return $x === $y;
        })($arr);

        $this->assertEquals([[0], [1, 1], [2], [3], [5], [8], [13], [21]], $res);

        $arr = ["a" => "a", "b" => "a", "c" => "c", "d" => "d"];
        $res = groupWith(function ($x, $y) {
            return $x === $y;
        })($arr);

        $this->assertEquals([["a" => "a", "b" => "a"], ["c" => "c"], ["d" => "d"]], $res);
    }
}
