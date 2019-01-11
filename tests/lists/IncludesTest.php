<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\includes;

class IncludesTest extends TestCase
{
    public function test_it_should_test_if_array_includes_value()
    {
        $arr = [1, 2, 3];

        $res = includes(1)($arr);
        $this->assertTrue($res);

        $arr = [1, 2, 3];

        $res = includes(5)($arr);
        $this->assertFalse($res);


        $arr = ["a" => "a", "b" => "b"];

        $res = includes("a")($arr);
        $this->assertTrue($res);

        $arr = ["a" => "a", "b" => "b"];

        $res = includes("d")($arr);
        $this->assertFalse($res);

    }
}
