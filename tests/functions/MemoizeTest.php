<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\memoize;

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
