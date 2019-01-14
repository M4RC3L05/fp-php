<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\reject;


class RejectTest extends TestCase
{
    public function test_it_should_filter_returning_the_non_matching_elements()
    {
        $arr = [1, 2, 3, 4];
        $res = reject(function ($x) {
            return $x % 2 === 0;
        })($arr);
        $this->assertEquals([1, 3], $res);


        $arr = ["a" => 1, "b" => 2, "c" => 3, "f" => 4];
        $res = reject(function ($x) {
            return $x % 2 === 0;
        })($arr);
        $this->assertEquals(["a" => 1, "c" => 3], $res);
    }
}
