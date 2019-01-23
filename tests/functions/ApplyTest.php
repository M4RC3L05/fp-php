<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\apply;


class ApplyTest extends TestCase
{
    public function test_it_should_apply_a_list_of_values_to_a_function()
    {
        $res = apply("\\max")([2, 3, 7, 5, 6]);
        $this->assertEquals(7, $res);
    }
}
