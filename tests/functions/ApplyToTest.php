<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\applyTo;


class ApplyToTest extends TestCase
{
    public function test_it_should_apply_given_value_to_given_function()
    {
        $identity = function ($x) {
            return $x;
        };

        $res = applyTo(12)($identity);
        $this->assertEquals(12, $res);
    }
}
