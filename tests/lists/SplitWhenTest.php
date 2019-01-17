<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\splitWhen;


class SplitWhenTest extends TestCase
{
    public function test_it_should_split_when_perdicate_is_false()
    {
        $arr = [1, 2, 3, 4, 5];
        $res = splitWhen(function ($x) {
            return $x !== 1;
        })($arr);
        $this->assertEquals([[1], [2, 3, 4, 5]], $res);


        $arr = [1, 2, 3, 4, 5];
        $res = splitWhen(function ($x) {
            return $x !== 5;
        })($arr);
        $this->assertEquals([[], [1, 2, 3, 4, 5]], $res);
    }
}
