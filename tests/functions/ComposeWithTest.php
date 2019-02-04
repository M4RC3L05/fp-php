<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\composeWith;


class ComposeWithTest extends TestCase
{
    public function test_should_compose_by_a_function()
    {
        $fn1 = function ($x) {
            echo "f1: {$x}";
            return $x;
        };

        $fn2 = function ($x) {
            echo "f2: {$x}";
            return null;
        };

        $fn3 = function ($x) {
            echo "f3: {$x}";
            return $x;
        };

        $res = composeWith(function ($fn, $res) {
            return \is_null($res) ? $res : $fn($res);
        })([$fn1, $fn2, $fn3]);

        \ob_start();
        $res(1);
        $r = \ob_get_clean();
        $this->assertEquals("f3: 1f2: 1", $r);
    }
}
        