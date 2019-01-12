<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\last;


class LastTest extends TestCase
{
    public function test_it_should_return_the_last_item()
    {
        $arr = [1, 2, 3];
        $res = last($arr);
        $this->assertEquals(3, $res);

        $res = last([]);
        $this->assertEquals(null, $res);

        $res = last(["a" => "a", "b" => "b"]);
        $this->assertEquals("b", $res);
    }
}
