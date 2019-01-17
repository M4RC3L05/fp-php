<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\reduce;


class ReduceTest extends TestCase
{
    public function test_it_should_reduce_iterable()
    {


        $res = reduce(function ($acc, $curr) {
            return $acc + $curr;
        })(1)([1, 2, 3]);
        $this->assertEquals($res, 7);


        $res = reduce(function ($acc, $curr) {
            return $acc + $curr;
        })(1)(["a" => 1, "b" => 2]);
        $this->assertEquals($res, 4);
    }
}
