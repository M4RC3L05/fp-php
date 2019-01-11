<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\init;


class InitTest extends TestCase
{
    public function test_it_should_return_a_new_array_less_the_last_element()
    {
        $arr = [1, 2, 3];
        $res = init($arr);
        $this->assertEquals([1, 2], $res);

        $arr = ["a" => "a", "b" => "b"];
        $res = init($arr);
        $this->assertEquals(["a" => "a"], $res);
    }
}
