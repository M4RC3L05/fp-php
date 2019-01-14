<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\repeat;


class RepeatTest extends TestCase
{
    public function test_it_should_create_list_of_repeated_elements()
    {
        $res = repeat("ola")(12);
        $this->assertEquals(["ola", "ola", "ola", "ola", "ola", "ola", "ola", "ola", "ola", "ola", "ola", "ola"], $res);

        $res = repeat("ola")(0);
        $this->assertEquals([], $res);
    }
}
