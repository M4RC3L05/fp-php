<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\insert;


class InsertTest extends TestCase
{
    public function test_it_should_insert_a_value_to_an_array_at_given_index()
    {
        $arr = [1, 2, 3];

        $res = insert(2)("x")($arr);
        $this->assertEquals([1, 2, "x", 3], $res);

        $res = insert(10)("x")($arr);
        $this->assertEquals([1, 2, 3], $res);

        $res = insert(10)("x")([]);
        $this->assertEquals([], $res);
    }
}
