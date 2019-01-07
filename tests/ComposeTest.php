<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function FPPHP\compose;

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
        $fnCompose = compose("Tests\\f3", [A::class, "bbb"], "Tests\\f2", [A::class, "aaa"], $f1);

        $this->assertTrue(\is_callable($fnCompose));

        \ob_start();
        $res = $fnCompose(10);
        $echos = \ob_get_clean();

        $this->assertEquals($res, 67);
        $this->assertEquals($echos, "f1A->aaaf2A::bbbf3");
    }

    public function test_it_should_throw_error_if_compose_is_not_called_with_functions()
    {
        try {
            compose()(19);
            $this->fail("Did not throw");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "No functions provided.");
        }
    }

    public function test_it_should_throw_error_if_compose_is_not_called_with_valid_functions()
    {
        try {
            compose("afsg", "adsgfd")(19);
            $this->fail("Did not throw");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "Could not call function.");
        }
    }

    public function test_it_should_throw_error_if_compose_is_not_called_with_argument()
    {
        try {
            compose("afsg", "adsgfd")(null);
            $this->fail("Did not throw");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "No argument provided.");
        }
    }
}
