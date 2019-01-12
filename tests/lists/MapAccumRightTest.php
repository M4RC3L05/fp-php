<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\mapAccumRight;


class MapAccumRightTest extends TestCase
{
    public function test_it_should_map_accumulate_reverse()
    {
        $appender = function ($x, $y) {
            return [$y . $x, $y . $x];
        };

        $res = mapAccumRight($appender)(5)(["1", "2", "3", "4"]);
        $this->assertEquals(['12345', ['12345', '2345', '345', '45']], $res);

        $res = mapAccumRight($appender)(5)(["a" => "1", "b" => "2", "c" => "3", "d" => "4"]);
        $this->assertEquals(['12345', ["a" => '12345', "b" => '2345', "c" => '345', "d" => '45']], $res);
    }
}
