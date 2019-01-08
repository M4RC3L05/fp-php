<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\partial;


class PartialTest extends TestCase
{
    public function test_it_should_partialy_apply_args_from_the_beginning()
    {
        $add = function ($x, $y) {
            return $x + $y;
        };

        $pApply = partial($add)([3]);

        $this->assertEquals($pApply(2), 5);
    }
}
