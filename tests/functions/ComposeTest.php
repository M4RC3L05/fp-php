<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\compose;

class A
{
    public function aaa($x)
    {
        echo "A->aaa";
        return $x + 3;
    }

    public static function bbb($x)
    {
        echo "A::bbb";
        return $x * 2;
    }
}

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

        // Should compose f3(bbb(f2(aaa(f1(10))))) = 67
        $fnCompose = compose("Tests\\Functions\\f3", [A::class, "bbb"], "Tests\\Functions\\f2", [A::class, "aaa"], $f1);

        $this->assertTrue(\is_callable($fnCompose));

        \ob_start();
        $res = $fnCompose(10);
        $echos = \ob_get_clean();

        $this->assertEquals($res, 67);
        $this->assertEquals($echos, "f1A->aaaf2A::bbbf3");
    }
}
