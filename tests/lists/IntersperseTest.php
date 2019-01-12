<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\intersperse;


class IntersperseTest extends TestCase
{
    public function test_it_should_add_a_seperator_to_an_array()
    {
        $arr = [1, 2, 3];
        $res = intersperse("c")($arr);
        $this->assertEquals([1, "c", 2, "c", 3], $res);

        $arr = [];
        $res = intersperse("c")($arr);
        $this->assertEquals([], $res);
    }
}
