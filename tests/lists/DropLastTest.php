<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\dropLast;


class DropLastTest extends TestCase
{
    public function test_it_should_drop_n_elements_from_the_end()
    {
        $arr = [1, 2, 3];

        $res = dropLast(1)($arr);
        $this->assertEquals([1, 2], $res);

        $arr = [1, 2, 3];

        $res = dropLast(2)($arr);
        $this->assertEquals([1], $res);

        $arr = [1, 2, 3];

        $res = dropLast(4)($arr);
        $this->assertEquals([], $res);

        $arr = [1, 2, 3];

        $res = dropLast(-1)($arr);
        $this->assertEquals([1, 2, 3], $res);

        $arr = ["a" => "a", "b" => "b"];

        $res = dropLast(1)($arr);
        $this->assertEquals(["a" => "a"], $res);
    }
}
