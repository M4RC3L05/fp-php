<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\dropRepeatsWith;


class DropRepeatsWithTest extends TestCase
{
    public function test_it_should_drop_given_a_predicate()
    {
        $arr = [1, -1, 1, 3, 4, -4, -4, -5, 5, 3, 3];
        $res = dropRepeatsWith(function ($x, $y) {
            return \abs($x) === \abs($y);
        })($arr);

        $this->assertEquals([1, 3, 4, -5, 3], $res);

        $arr = [];
        $res = dropRepeatsWith(function ($x, $y) {
            return \abs($x) === \abs($y);
        })($arr);

        $this->assertEquals([], $res);


        $arr = ["a" => "a", "b" => "a", "c" => "c", "d" => "d"];
        $res = dropRepeatsWith(function ($x, $y) {
            return $x === "b" || $x === "c";
        })($arr);

        $this->assertEquals(["a" => "a", "b" => "a", "d" => "c"], $res);
    }
}
