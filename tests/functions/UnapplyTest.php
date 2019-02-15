<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\unapply;


class UnapplyTest extends TestCase
{
    public function test_it_should_unApply()
    {
        $res = unapply("json_encode")(1, 2, 3);
        $this->assertEquals("[1,2,3]", $res);
    }
}
