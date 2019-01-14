<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\remove;


class RemoveTest extends TestCase
{
    public function test_i_should_remove_a_segment_of_a_list()
    {

        $arr = [1, 2, 3, 4, 5, 6, 7, 8];
        $res = remove(-2)(3)($arr);
        $this->assertEquals([1, 2, 3, 4, 5, 6], $res);

        $arr = ["a" => "a", "b" => "b", "c" => "c", "d" => "d"];
        $res = remove(1)(2)($arr);
        $this->assertEquals(["a" => "a", "d" => "d"], $res);
    }
}
