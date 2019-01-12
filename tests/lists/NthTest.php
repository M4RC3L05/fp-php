<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\nth;


class NthTest extends TestCase
{
    public function test_should_return_the_nth_element()
    {
        $arr = [1, 2, 3, 4, 5];
        $res = nth(1)($arr);
        $this->assertEquals(2, $res);

        $arr = [1, 2, 3, 4, 5];
        $res = nth(-1)($arr);
        $this->assertEquals(5, $res);

        $arr = [1, 2, 3, 4, 5];
        $res = nth(100)($arr);
        $this->assertEquals(null, $res);

        $arr = [1, 2, 3, 4, 5];
        $res = nth(-100)($arr);
        $this->assertEquals(null, $res);

        $arr = [];
        $res = nth(10)($arr);
        $this->assertEquals(null, $res);
    }
}
