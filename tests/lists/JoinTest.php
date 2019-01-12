<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\join;


class JoinTest extends TestCase
{
    public function test_it_should_join_an_array_by_a_separator()
    {
        $arr = [1, 2, 3];
        $res = join("!")($arr);
        $this->assertEquals("1!2!3", $res);

        $arr = ["a" => "b", "b" => "c"];
        $res = join("!")($arr);
        $this->assertEquals("b!c", $res);

        $arr = [];
        $res = join("!")($arr);
        $this->assertEquals("", $res);
    }
}
