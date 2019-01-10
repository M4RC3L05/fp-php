<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\dropRepeats;


class DropRepeatsTest extends TestCase
{
    public function test_it_should_drop_repet_pairs()
    {
        $arr = [1, 1, 1, 2, 4, 3, 4, 4, 2, 2];

        $res = dropRepeats($arr);
        $this->assertEquals([1, 2, 4, 3, 4, 2], $res);

        $arr = ["a" => "a", "b" => "b", "c" => "c", "d" => "c"];

        $res = dropRepeats($arr);
        $this->assertEquals(["a" => "a", "b" => "b", "d" => "c"], $res);
    }
}
