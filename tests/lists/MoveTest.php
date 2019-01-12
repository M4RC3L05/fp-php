<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\move;


class MoveTest extends TestCase
{
    public function test_it_should_move_elemento_to_a_given_position()
    {
        $arr = ['a', 'b', 'c', 'd', 'e', 'f'];
        $res = move(3)(1)($arr);
        $this->assertEquals(["a", "d", "b", "c", "e", "f"], $res);

        $arr = [1, 2, 3, 4, 5, 6];
        $res = move(-1)(-1)($arr);
        $this->assertEquals([1, 2, 3, 4, 5, 6], $res);

        $arr = [1, 2, 3, 4, 5, 6];
        $res = move(-1)(0)($arr);
        $this->assertEquals([6, 1, 2, 3, 4, 5], $res);
    }
}
