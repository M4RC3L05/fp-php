<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\head;


class HeadTest extends TestCase
{
    public function test_it_should_return_the_first_elemento_of_iterable()
    {
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();
        $res = head($gen);
        $this->assertEquals($res, 1);

        $res = head([2, 2, 2]);
        $this->assertEquals($res, 2);

        $ai = (new \ArrayIterator(["a" => "a", "b" => "b"]));
        $res = head($ai);
        $this->assertEquals($res, "a");

        $res = head(["a" => "a", "b" => "b"]);
        $this->assertEquals($res, "a");
    }
}
