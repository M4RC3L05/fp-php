<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\adjust;


class AdjustTest extends TestCase
{
    public function test_it_should_apply_a_function_to_an_element_of_an_array_and_update()
    {
        $res = adjust(-1)(function ($x) {
            return $x * 2;
        })([1, 2, 3]);
        $this->assertEquals([1, 2, 6], $res);

        $res = adjust(0)(function ($x) {
            return $x * 2;
        })([1, 2, 3]);
        $this->assertEquals([2, 2, 3], $res);

        $res = adjust(10)(function ($x) {
            return $x * 2;
        })([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $res);
    }
}
