<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\takeWhile;


class TakeWhileTest extends TestCase
{
    public function test_it_should_take_while_perdicate_is_true()
    {
        $arr = [1, 2, 3, 4];
        $res = takeWhile(function ($x) {
            return $x < 4;
        })($arr);
        $this->assertEquals([1, 2, 3], $res);

        $arr = [];
        $res = takeWhile(function ($x) {
            return $x < 4;
        })($arr);
        $this->assertEquals([], $res);

        $arr = ["a" => 1, "b" => 2, "c" => 3];
        $res = takeWhile(function ($x) {
            return $x < 4;
        })($arr);
        $this->assertEquals(["a" => 1, "b" => 2, "c" => 3], $res);
    }
}
