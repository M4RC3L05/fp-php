<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\T;


class TTest extends TestCase
{
    public function test_should_return_true()
    {
        $this->assertTrue(T());
    }
}
