<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\transpose;


class TransposeTest extends TestCase
{
    public function test_it_should_traspose_list()
    {
        $res = transpose([[1, "a"], [2], [3, "c"]]);
        $this->assertEquals([[1, 2, 3], ["a", "c"]], $res);

        $res = transpose([]);
        $this->assertEquals([], $res);
    }
}
