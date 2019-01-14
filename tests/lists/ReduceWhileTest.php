<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\reduceWhile;


class ReduceWhileTest extends TestCase
{
    public function test_it_should_reduce_while_perdicate_is_true()
    {
        $arr = [2, 4, 6];
        $isOdd = function ($acc, $x) {
            return $x % 2 === 1;
        };

        $isEven = function ($acc, $x) {
            return $x % 2 === 0;
        };

        $add = function ($acc, $curr) {
            return $acc + $curr;
        };

        $res = reduceWhile($isOdd)($add)(1)($arr);
        $this->assertEquals(1, $res);

        $res = reduceWhile($isEven)($add)(1)($arr);
        $this->assertEquals(13, $res);

        $res = reduceWhile($isEven)($add)(1)([1, 2, 3, 4, 5, 6]);
        $this->assertEquals(13, $res);
    }
}
