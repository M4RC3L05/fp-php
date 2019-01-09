<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\take;


class TakeTest extends TestCase
{
    public function test_it_should_take_up_to_the_given_value_from_an_iterable()
    {
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();
        $res = take(2)($gen);
        $this->assertEquals([1, 2], $res);

        $res = take(1)([2, 2, 2]);
        $this->assertEquals([2], $res);

        $ai = (new \ArrayIterator(["a" => "a", "b" => "b"]));
        $res = take(2)($ai);
        $this->assertEquals(["a" => "a", "b" => "b"], $res);

        $res = take(2)(["a" => "a", "b" => "b", "c" => "c"]);
        $this->assertEquals(["a" => "a", "b" => "b"], $res);
    }
}
