<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\always;


class AlwaysTest extends TestCase
{
    public function test_it_should_return_a_function_that_returns_the_provided_value()
    {
        $res = always(12);
        $this->assertTrue(\is_callable($res));
        $this->assertEquals(12, $res());
        $this->assertEquals(12, $res(13));
    }
}
