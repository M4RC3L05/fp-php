<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\mapAccum;


class MapAccumTest extends TestCase
{
    public function test_it_should_map_accumulate_array()
    {
        $appender = function ($x, $y) {
            return [$x . $y, $x . $y];
        };

        $res = mapAccum($appender)(0)(["1", "2", "3", "4"]);
        $this->assertEquals(['01234', ['01', '012', '0123', '01234']], $res);

        $res = mapAccum($appender)(0)(["a" => "1", "b" => "2", "c" => "3", "d" => "4"]);
        $this->assertEquals(['01234', ["a" => '01', "b" => '012', "c" => '0123', "d" => '01234']], $res);
    }
}
