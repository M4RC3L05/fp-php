<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\indexBy;


class IndexByTest extends TestCase
{
    public function test_it_shoud_index_array_by_given_key_from_function()
    {
        $arr = [
            ["name" => "João", "country" => "Portugal"],
            ["name" => "Ana", "country" => "Brasil"],
        ];
        $res = indexBy(function ($x) {
            return $x["country"];
        })($arr);

        $this->assertEquals(["Portugal" => ["name" => "João", "country" => "Portugal"], "Brasil" => ["name" => "Ana", "country" => "Brasil"]], $res);

        $arr = [];
        $res = indexBy(function ($x) {
            return $x["country"];
        })($arr);

        $this->assertEquals([], $res);

    }
}
