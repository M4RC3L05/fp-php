<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\partial;


class PartialRightTest extends TestCase
{
    public function test_it_should_partialy_apply_args_from_the_end()
    {
        $add = function ($x, $y) {
            return $x + $y;
        };

        $pApply = partial($add)([2]);

        $this->assertEquals($pApply(3), 5);
    }
}
