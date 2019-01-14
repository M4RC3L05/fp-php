<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\prepend;


class PrependTest extends TestCase
{
    public function test_it_should_prepend_to_an_array()
    {
        $res = prepend(2)([1, 2]);
        $this->assertEquals([2, 1, 2], $res);

        $res = prepend(2)([]);
        $this->assertEquals([2], $res);
    }
}
