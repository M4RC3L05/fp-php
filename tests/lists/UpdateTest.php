<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\update;


class UpdateTest extends TestCase
{
    public function test_it_should_update_list_given_a_index_and_the_value()
    {
        $arr = [1, 2, 3];
        $res = update(-1)(4)($arr);
        $this->assertEquals([1, 2, 4], $res);

        $arr = [1, 2, 3];
        $res = update(0)(10)($arr);
        $this->assertEquals([10, 2, 3], $res);

        $arr = ["a" => 1, "ff" => 2, "ggg" => 3];
        $res = update("ggg")(4)($arr);
        $this->assertEquals(["a" => 1, "ff" => 2, "ggg" => 4], $res);
    }
}
