<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\nthArg;


class NthArgTest extends TestCase
{
    public function test_it_should_return_the_nth_arg()
    {
        $this->assertEquals(2, nthArg(1)(1, 2, 3, 4));
        $this->assertEquals(4, nthArg(-1)(1, 2, 3, 4));
        $this->assertEquals(4, nthArg(10)(1, 2, 3, 4));
        $this->assertEquals(1, nthArg(-10)(1, 2, 3, 4));
    }
}
        