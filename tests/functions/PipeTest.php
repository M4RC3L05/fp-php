<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\pipe;

class B
{
    public function aaa($x)
    {
        echo "B->aaa";
        return $x + 3;
    }

    public static function bbb($x)
    {
        echo "B::bbb";
        return $x * 2;
    }
}

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

        // Should compose f11(aaa(f22(bbb(f33(10))))) = 45
        $fnPipe = pipe("Tests\\Functions\\f33", [B::class, "bbb"], "Tests\\Functions\\f22", [new B(), "aaa"], $f11);

        $this->assertTrue(\is_callable($fnPipe));

        \ob_start();
        $res = $fnPipe(10);
        $echos = \ob_get_clean();

        $this->assertEquals($res, 45);
        $this->assertEquals($echos, "f33B::bbbf22B->aaaf11");
    }
}
