<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\curry;

class E
{
    public function aaa($x)
    {
        return $x + 3;
    }

    public static function bbb($x, $y)
    {
        return $x * $y;
    }
}

class CurryTest extends TestCase
{
    public function test_it_should_curry_function()
    {
        function ccc($x, $y, $z)
        {
            return $x + $y + $z;
        }

        $curryCCC = curry(__NAMESPACE__ . "\\ccc");

        $this->assertTrue(\is_callable($curryCCC));

        $r1 = $curryCCC(1);
        $this->assertTrue(\is_callable($r1));

        $r2 = $r1(2);
        $this->assertTrue(\is_callable($r2));

        $res = $r2(3);

        $this->assertEquals($res, 6);

        $curryEAAA = curry([E::class, "aaa"]);

        $res = $curryEAAA(12);
        $this->assertEquals($res, 15);

        $curryEBBB = curry(E::class . "::bbb");
        $r1 = $curryEBBB(12);
        $this->assertTrue(\is_callable($r1));
        $res = $r1(12);
        $this->assertEquals($res, 144);

        $currNone = curry(function () {
            return 12;
        });

        $res = $currNone();
        $this->assertEquals($res, 12);
    }
}
