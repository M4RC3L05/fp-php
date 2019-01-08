<?php

namespace Test\Utils;

use PHPUnit\Framework\TestCase;
use function FPPHP\Utils\isIterable;

class IsIterableTest extends TestCase
{
    public function test_it_should_check_if_is_a_iterable()
    {
        //ARRAYS
        $this->assertTrue(isIterable([1, 2, 3]));


        // ArrayIterator
        $this->assertTrue(isIterable(new \ArrayIterator([1, 2, 3])));

        // generators
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();
        $this->assertTrue(isIterable($gen));

        //assoc arrays
        $this->assertTrue(isIterable([
            "a" => "a",
            "b" => "b",
            "c" => "c"
        ]));

        $this->assertFalse(isIterable("string"));
    }
}
