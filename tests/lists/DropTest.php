<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\drop;


class DropTest extends TestCase
{
    public function test_it_should_drop_n_elements_from_the_start()
    {
        $arr = [1, 2, 3];

        $res = drop(1)($arr);
        $this->assertEquals([2, 3], $res);

        $arr = [1, 2, 3];

        $res = drop(2)($arr);
        $this->assertEquals([3], $res);

        $arr = [1, 2, 3];

        $res = drop(4)($arr);
        $this->assertEquals([], $res);

        $arr = [1, 2, 3];

        $res = drop(-1)($arr);
        $this->assertEquals([1, 2, 3], $res);

        $arr = ["a" => "a", "b" => "b"];

        $res = drop(1)($arr);
        $this->assertEquals(["b" => "b"], $res);
    }
}
