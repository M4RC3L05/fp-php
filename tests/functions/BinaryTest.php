<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\binary;


class BinaryTest extends TestCase
{
    public function test()
    {
        $abc = function ($x, $y, $z) {
            echo $x;
            echo $y;
            echo $z;
        };

        $binAbc = binary($abc);
        \ob_start();
        $binAbc(1, 2);
        $res = \ob_get_clean();
        $this->assertEquals("12", $res);

        \ob_start();
        $binAbc(1, 2, 3);
        $res = \ob_get_clean();
        $this->assertEquals("12", $res);
    }
}
        