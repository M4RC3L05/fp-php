<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\zipAssoc;


class ZipAssocTest extends TestCase
{
    public function test_it_should_turn_2_list_into_a_assoc_list()
    {
        $res = zipAssoc(["1", 2, 3])(["a", "b"]);
        $this->assertEquals(["1" => "a", 2 => "b"], $res);

        $res = zipAssoc([])(["a", "b"]);
        $this->assertEquals([], $res);
    }
}
