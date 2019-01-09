<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\head;


class HeadTest extends TestCase
{
    public function test_it_should_return_the_first_elemento_of_iterable()
    {

        $res = head([2, 2, 2]);
        $this->assertEquals($res, 2);

        $res = head(["a" => "a", "b" => "b"]);
        $this->assertEquals($res, "a");
    }
}
