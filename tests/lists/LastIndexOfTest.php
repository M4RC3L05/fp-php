<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\lastIndexOf;


class LastIndexOfTest extends TestCase
{
    public function test_it_should_find_the_position_of_the_last_ocurrence_of_an_item_in_an_array()
    {
        $res = lastIndexOf(3)([-1, 3, 3, 0, 1, 2, 3, 4]);
        $this->assertEquals(6, $res);

        $res = lastIndexOf(10)([-1, 3, 3, 0, 1, 2, 3, 4]);
        $this->assertEquals(-1, $res);

        $res = lastIndexOf(10)([]);
        $this->assertEquals(-1, $res);

        $res = lastIndexOf("a")(["a" => "a", "b" => "a"]);
        $this->assertEquals("b", $res);
    }
}
