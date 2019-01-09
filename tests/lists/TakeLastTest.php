<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\takeLast;


class TakeLastTest extends TestCase
{
    public function test_it_should_take_up_to_the_given_value_from_the_back_of_an_iterable()
    {
        $res = takeLast(1)([2, 2, 2]);
        $this->assertEquals([2], $res);

        $res = takeLast(2)(["a" => "a", "b" => "b", "c" => "c"]);
        $this->assertEquals(["b" => "b", "c" => "c"], $res);
    }
}
