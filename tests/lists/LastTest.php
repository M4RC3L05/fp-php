<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\last;


class LastTest extends TestCase
{
    public function test_it_should_return_the_last_elemento_of_iterable()
    {

        $res = last([2, 2, 2]);
        $this->assertEquals($res, 2);

        $res = last(["a" => "a", "b" => "b"]);
        $this->assertEquals($res, "b");
    }
}
