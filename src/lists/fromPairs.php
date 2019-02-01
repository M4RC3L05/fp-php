<?php

namespace FPPHP\Lists;

/**
 * 
 * fromPairs: [[x => y]] -> [x => y]
 * 
 * Retruns a new associative array from an array of associative
 * arrays
 * 
 * @param array $list
 * @return array
 * 
 */
function fromPairs(array $list)
{
    $tmp = [];

    foreach ($list as $key => $value) {
        $tmp[$value[0]] = $value[1];
    }

    return $tmp;
}
