<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\dropLastWhile;


class DropLastWhileTest extends TestCase
{
    public function test_it_should_drop_while_perdicate_is_true()
    {
        $arr = [1, 2, 3, 4, 3, 2, 1];
        $perdicate = function ($v) {
            return $v <= 3;
        };
        $res = dropLastWhile($perdicate)($arr);

        $this->assertEquals([1, 2, 3, 4], $res);

        $arr = ["a" => "a", "b" => "a", "c" => "c"];
        $perdicate = function ($v) {
            return $v === "a";
        };
        $res = dropLastWhile($perdicate)($arr);

        $this->assertEquals(["a" => "a", "b" => "a", "c" => "c"], $res);

        $arr = ["a" => "a", "b" => "a", "c" => "c"];
        $perdicate = function ($v) {
            return $v !== "a";
        };
        $res = dropLastWhile($perdicate)($arr);

        $this->assertEquals(["a" => "a", "b" => "a"], $res);
    }
}
