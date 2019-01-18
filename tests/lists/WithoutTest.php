<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\without;


class WithoutTest extends TestCase
{
    public function test_it_should_remove_elements_that_are_in_agiven_list()
    {
        $res = without([1, 2])([1, 2, 1, 3, 4]);
        $this->assertEquals([3, 4], $res);

        $res = without([])([1, 2, 1, 3, 4]);
        $this->assertEquals([1, 2, 1, 3, 4], $res);


        $res = without([2])(["a" => 1, "b" => 2, "c" => 1, "d" => 3, "e" => 4]);
        $this->assertEquals(["a" => 1, "c" => 1, "d" => 3, "e" => 4], $res);

    }
}
