<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\partition;


class PartitionTest extends TestCase
{
    public function test_it_should_partionate_to_match_and_not_match_perdicate()
    {
        $arr = [1, 2, 3, 4, 5, 6];
        $isEven = function ($x) {
            return $x % 2 === 0;
        };

        $res = partition($isEven)($arr);
        $this->assertEquals([[2, 4, 6], [1, 3, 5]], $res);


        $arr = ["a" => 1, "b" => 2];
        $isEven = function ($x) {
            return $x % 2 === 0;
        };

        $res = partition($isEven)($arr);
        $this->assertEquals([["b" => 2], ["a" => 1]], $res);
    }
}
