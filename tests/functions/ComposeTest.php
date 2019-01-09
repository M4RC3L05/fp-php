<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\compose;

class ComposeTest extends TestCase
{
    public function test_it_should_compose_multiple_functions()
    {
        $f1 = function ($x) {
            echo "f1";
            return $x + 22;
        };

        function f2($x)
        {
            echo "f2";
            return $x - 2;
        }

        function f3($x)
        {
            echo "f3";
            return $x + 1;
        }


        $fnCompose = compose("Tests\\Functions\\f3", "Tests\\Functions\\f2", $f1);

        $this->assertTrue(\is_callable($fnCompose));

        \ob_start();
        $res = $fnCompose(10);
        $echos = \ob_get_clean();

        $this->assertEquals($res, 31);
        $this->assertEquals($echos, "f1f2f3");
    }
}
