<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\pipe;

class PipeTest extends TestCase
{
    public function test_it_should_pipe_multiple_functions()
    {
        $f11 = function ($x) {
            echo "f11";
            return $x + 22;
        };

        function f22($x)
        {
            echo "f22";
            return $x - 2;
        }

        function f33($x)
        {
            echo "f33";
            return $x + 1;
        }

        $fnPipe = pipe("Tests\\Functions\\f33", "Tests\\Functions\\f22", $f11);

        $this->assertTrue(\is_callable($fnPipe));

        \ob_start();
        $res = $fnPipe(10);
        $echos = \ob_get_clean();

        $this->assertEquals($res, 31);
        $this->assertEquals($echos, "f33f22f11");
    }
}
