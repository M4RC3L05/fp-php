<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\tap;


class TapTest extends TestCase
{
    public function test_it_should_tap_and_return_args()
    {
        $aa = tap(function ($x) {
            echo "oi $x";
        });

        \ob_start();
        $res = $aa("abc");
        $r = \ob_get_clean();

        $this->assertEquals("abc", $res);
        $this->assertEquals("oi abc", $r);
    }
}
