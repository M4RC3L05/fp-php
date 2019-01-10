<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\dropWhile;


class DropWhileTest extends TestCase
{
    public function test_it_should_frop_while_perdicate_is_true()
    {
        $arr = [1, 2, 3, 4, 3, 2, 1];

        $res = dropWhile(function ($x, $y) {
            return $x <= 2;
        })($arr);

        $this->assertEquals([3, 4, 3, 2, 1], $res);

        $arr = [1, 2, 3, 4, 3, 2, 1];

        $res = dropWhile(function ($x, $y) {
            return false;
        })($arr);

        $this->assertEquals([1, 2, 3, 4, 3, 2, 1], $res);

        $arr = ["a" => "a", "b" => "a", "c" => "a", "d" => "d", "e" => "a"];

        $res = dropWhile(function ($x, $y) {
            return $x === "a";
        })($arr);

        $this->assertEquals(["d" => "d", "e" => "a"], $res);
    }
}
