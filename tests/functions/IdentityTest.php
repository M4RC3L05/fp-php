<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\identity;


class IdentityTest extends TestCase
{
    public function test_it_should_return_the_same_arg()
    {
        $this->assertEquals(identity([]), []);
        $this->assertEquals(identity(1), 1);
    }
}
        