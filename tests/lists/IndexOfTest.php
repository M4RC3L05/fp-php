<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\indexOf;


class IndexOfTest extends TestCase
{
    public function test_it_should_give_the_position_of_the_first_ocurrence()
    {
        $res = indexOf(3)([-1, 3, 3, 0, 1, 2, 3, 4]);
        $this->assertEquals(1, $res);

        $res = indexOf(10)([-1, 3, 3, 0, 1, 2, 3, 4]);
        $this->assertEquals(-1, $res);

        $res = indexOf(10)([]);
        $this->assertEquals(-1, $res);

        $res = indexOf("a")(["a" => "a", "b" => "a"]);
        $this->assertEquals("a", $res);
    }
}
