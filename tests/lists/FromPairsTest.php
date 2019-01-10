<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\fromPairs;


class FromPairsTest extends TestCase
{
    public function test_it_should_create_a_assoc_arr_from_array_of_pairs()
    {
        $arr = [["a", 1], [2, 2], [3, 3], [4, 4]];

        $res = fromPairs($arr);
        $this->assertEquals(["a" => 1, "2" => 2, "3" => 3, "4" => 4], $res);

        $arr = [];

        $res = fromPairs($arr);
        $this->assertEquals([], $res);
    }
}
