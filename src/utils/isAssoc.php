<?php

namespace FPPHP\utils;

//https://stackoverflow.com/questions/173400/how-to-check-if-php-array-is-associative-or-sequential#173479
function isAssoc(array $arr)
{
    if (count($arr) <= 0) return false;
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
}
