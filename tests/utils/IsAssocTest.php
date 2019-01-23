<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\utils\isAssoc;


class IsAssocTest extends TestCase
{
    public function test_it_should_check_if_is_an_associative_array()
    {
        $this->assertFalse(isAssoc([]));
        $this->assertFalse(isAssoc([1, 2, 3, 4]));
        $this->assertFalse(isAssoc(["0" => 1, "1" => "2", "2" => 3, "3" => 4]));
        $this->assertTrue(isAssoc(["1" => 1, "2" => "2", "3" => 3, "5" => 4]));
        $this->assertTrue(isAssoc(["a" => 1, "b" => "2", "c" => 3, "d" => 4]));
    }
}
