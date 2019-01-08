<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\memoize;

class C
{
    static function a($x)
    {
        echo "C::a";
        return $x;
    }

    function b($x)
    {
        echo "C->b";
        return $x;
    }
}

class MemoizeTest extends TestCase
{
    public function test_it_should_memoize_given_function()
    {
        function abc($x, $y)
        {
            echo "abc";
            return $x + $y;
        }

        $abcMemo = memoize(__NAMESPACE__ . "\abc");

        $this->assertTrue(\is_callable($abcMemo));


        \ob_start();
        $r1 = $abcMemo(1, 2);
        $r2 = $abcMemo(1, 2);
        $r11 = $abcMemo(2, 2);
        $r22 = $abcMemo(2, 2);
        $echos = \ob_get_clean();

        $this->assertEquals($echos, "abcabc");
        $this->assertEquals($r1, $r2);
        $this->assertEquals($r11, $r22);


        $CBMemo = memoize([C::class, "b"]);

        $this->assertTrue(\is_callable($CBMemo));


        \ob_start();
        $r111 = $CBMemo(1, 2);
        $r222 = $CBMemo(1, 2);
        $r1111 = $CBMemo(2, 2);
        $r2222 = $CBMemo(2, 2);
        $echos2 = \ob_get_clean();

        $this->assertEquals($echos2, "C->bC->b");
        $this->assertEquals($r111, $r222);
        $this->assertEquals($r1111, $r2222);

        $CAMemo = memoize([C::class, "a"]);

        $this->assertTrue(\is_callable($CAMemo));


        \ob_start();
        $r1111 = $CAMemo(1, 2);
        $r2222 = $CAMemo(1, 2);
        $r11111 = $CAMemo(2, 2);
        $r22222 = $CAMemo(2, 2);
        $echos2 = \ob_get_clean();

        $this->assertEquals($echos2, "C::aC::a");
        $this->assertEquals($r1111, $r2222);
        $this->assertEquals($r11111, $r22222);

        $AnoMemo = memoize(function ($x) {
            echo "anonym";
            return $x;
        });

        $this->assertTrue(\is_callable($AnoMemo));


        \ob_start();
        $r11111 = $AnoMemo(1, 2);
        $r22222 = $AnoMemo(1, 2);
        $r111111 = $AnoMemo(2, 2);
        $r222222 = $AnoMemo(2, 2);
        $echos3 = \ob_get_clean();

        $this->assertEquals($echos3, "anonymanonym");
        $this->assertEquals($r11111, $r22222);
        $this->assertEquals($r111111, $r222222);
    }
}
