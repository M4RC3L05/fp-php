<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\takeLast;


class TakeLastTest extends TestCase
{
    public function test_it_should_take_up_to_the_given_value_from_the_back_of_an_iterable()
    {
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();
        $res = takeLast(2)($gen);
        $this->assertEquals([2, 3], $res);

        $res = takeLast(1)([2, 2, 2]);
        $this->assertEquals([2], $res);

        $ai = (new \ArrayIterator(["a" => "a", "b" => "b"]));
        $res = takeLast(2)($ai);
        $this->assertEquals(["a" => "a", "b" => "b"], $res);

        $res = takeLast(2)(["a" => "a", "b" => "b", "c" => "c"]);
        $this->assertEquals(["b" => "b", "c" => "c"], $res);
    }
}
