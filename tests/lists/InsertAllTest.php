<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\insertAll;


class InsertAllTest extends TestCase
{
    public function test_it_should_insert_every_element_of_an_array_to_other_on_a_specifique_index()
    {
        $arr = [1, 2, 3, 4];

        $res = insertAll(2)(["x", "y", "z"])($arr);
        $this->assertEquals([1, 2, "x", "y", "z", 3, 4], $res);

        $arr = [1, 2, 3, 4];

        $res = insertAll(2)([])($arr);
        $this->assertEquals([1, 2, 3, 4], $res);

        $res = insertAll(-1)(["x", "y", "z"])($arr);
        $this->assertEquals([1, 2, 3, 4, "x", "y", "z"], $res);
    }
}
