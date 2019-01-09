<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\take;


class TakeTest extends TestCase
{
    public function test_it_should_take_up_to_the_given_value_from_an_iterable()
    {
        $res = take(1)([2, 2, 2]);
        $this->assertEquals([2], $res);

        $res = take(2)(["a" => "a", "b" => "b", "c" => "c"]);
        $this->assertEquals(["a" => "a", "b" => "b"], $res);
    }
}
