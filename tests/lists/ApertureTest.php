<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\aperture;


class ApertureTest extends TestCase
{
    public function test()
    {
        $arr = [1, 2, 3, 4, 5];
        $arrAp = aperture(2)($arr);
        $this->assertEquals([[1, 2], [3, 4], [5]], $arrAp);

        $arr = [1, 2, 3, 4, 5];
        $arrAp = aperture(5)($arr);
        $this->assertEquals([[1, 2, 3, 4, 5]], $arrAp);

        $arr = [1, 2, 3, 4, 5];
        $arrAp = aperture(6)($arr);
        $this->assertEquals([], $arrAp);

        $arr = ["a" => "a", "b" => "b", "c" => "c"];
        $arrAp = aperture(2)($arr);
        $this->assertEquals([["a" => "a", "b" => "b"], ["c" => "c"]], $arrAp);
    }
}
