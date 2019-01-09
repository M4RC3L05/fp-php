<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\tail;


class TailTest extends TestCase
{
    public function test_it_should_return_the_an_list_of_the_elements_less_the_head()
    {

        $res = tail([2, 2, 2]);
        $this->assertEquals([2, 2], $res);

        $res = tail(["a" => "a", "b" => "b", "c" => "c"]);
        $this->assertEquals(["b" => "b", "c" => "c"], $res);
    }
}
