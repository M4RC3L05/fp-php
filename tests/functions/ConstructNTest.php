<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\constructN;


class CCC
{
    public function __construct()
    {
        \print_r(\func_get_args());
    }
}

class ConstructNTest extends TestCase
{
    public function test_it_should_curry_a_construct_function_by_n_args()
    {
        $res = constructN(2)(CCC::class);
        \ob_start();
        $obj = $res("a")("c");
        $r = \ob_get_clean();
        $this->assertEquals("Array([0]=>a[1]=>c)", \str_replace(["\n", " "], "", $r));
        $this->assertTrue($obj instanceof CCC);
    }
}
        