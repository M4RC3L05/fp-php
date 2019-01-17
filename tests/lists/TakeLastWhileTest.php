<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\takeLastWhile;


class TakeLastWhileTest extends TestCase
{
    public function test_should_take_while_perdicate_is_true_from_the_end()
    {
        $arr = [1, 2, 3, 4];
        $res = takeLastWhile(function ($x) {
            return $x !== 1;
        })($arr);
        $this->assertEquals([2, 3, 4], $res);

        $arr = [];
        $res = takeLastWhile(function ($x) {
            return $x !== 1;
        })($arr);
        $this->assertEquals([], $res);
    }
}
