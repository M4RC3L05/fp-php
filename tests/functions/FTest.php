<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\F;


class FTest extends TestCase
{
    public function test_it_should_allways_return_false()
    {
        $this->assertFalse(F());
        $this->assertFalse(F(23342, 2, 36));
    }
}
        