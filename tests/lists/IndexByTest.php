<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\indexBy;

class Person
{
    public $name;
    public $country;

    public function __construct($name, $country)
    {
        $this->name = $name;
        $this->country = $country;
    }
}

class IndexByTest extends TestCase
{
    public function test_it_shoud_index_array_by_given_key_from_function()
    {
        $arr = [
            ["name" => "João", "country" => "Portugal"],
            ["name" => "Ana", "country" => "Brasil"],
        ];
        $res = indexBy(function ($x) {
            return (is_array($x) ? $x["country"] : $x->country);
        })($arr);

        $this->assertEquals(["Portugal" => ["name" => "João", "country" => "Portugal"], "Brasil" => ["name" => "Ana", "country" => "Brasil"]], $res);

        $arr = [];
        $res = indexBy(function ($x) {
            return (is_array($x) ? $x["country"] : $x->country);
        })($arr);

        $this->assertEquals([], $res);

        $arr = [
            new Person("João", "Portugal"),
            new Person("Ana", "Brasil"),
        ];
        $res = indexBy(function ($x) {
            return (is_array($x) ? $x["name"] : $x->name);
        })($arr);

        $this->assertEquals(["João" => new Person("João", "Portugal"), "Ana" => new Person("Ana", "Brasil")], $res);
    }
}
