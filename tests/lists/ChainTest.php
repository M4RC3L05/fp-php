<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\chain;
use function FPPHP\Lists\head;
use function FPPHP\Lists\append;
use function FPPHP\Functions\pipe;


class ChainTest extends TestCase
{
    public function test_it_should_chain_an_array()
    {
        $duplicate = function ($x, $y) {
            return [$x, $x];
        };
        $arr = [1, 2, 3];
        $arrChained = chain($duplicate)($arr);

        $this->assertEquals([1, 2, 3], $arr);
        $this->assertEquals([1, 1, 2, 2, 3, 3], $arrChained);

        $arr = [1, 2, 3];
        $arrChained = chain(
            "\FPPHP\Lists\append",
            "\FPPHP\Lists\head"
        )($arr);

        $this->assertEquals([1, 2, 3], $arr);
        $this->assertEquals([1, 2, 3, 1], $arrChained);
    }
}
