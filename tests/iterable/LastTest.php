<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\last;


class LastTest extends TestCase
{
    public function test_it_should_return_the_last_elemento_of_iterable()
    {
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();
        $res = last($gen);
        $this->assertEquals($res, 3);

        $res = last([2, 2, 2]);
        $this->assertEquals($res, 2);

        $ai = (new \ArrayIterator(["a" => "a", "b" => "b"]));
        $res = last($ai);
        $this->assertEquals($res, "b");

        $res = last(["a" => "a", "b" => "b"]);
        $this->assertEquals($res, "b");
    }
}
