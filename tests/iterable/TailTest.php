<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\tail;


class TailTest extends TestCase
{
    public function test_it_should_return_the_an_list_of_the_elements_less_the_head()
    {
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();
        $res = tail($gen);
        $this->assertEquals([2, 3], $res);

        $res = tail([2, 2, 2]);
        $this->assertEquals([2, 2], $res);

        $ai = (new \ArrayIterator(["a" => "a", "b" => "b"]));
        $res = tail($ai);
        $this->assertEquals(["b"], $res);

        $res = tail(["a" => "a", "b" => "b", "c" => "c"]);
        $this->assertEquals(["b", "c"], $res);
    }
}
