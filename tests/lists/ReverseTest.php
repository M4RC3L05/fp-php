<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\reverse;



class ReverseTest extends TestCase
{
    public function test_it_should_reverse_an_array()
    {
        $arr = [1, 2, 3];
        $arrRev = reverse($arr);

        $this->assertEquals([3, 2, 1], $arrRev);
    }
}
