<?php

tower_builder(3);

function tower_builder(int $n): array {
    $tower = array();
    $maxLen = starCounter($n-1);
    for($i=0; $i<$n;$i++) {
        $tower[$i] = "";
        for($j=0;$j<starCounter($i);$j++){
            $tower[$i] .= "*";
        }

        $tower[$i] = str_pad($tower[$i], $maxLen); 
    }
    print_r($tower);
    return $tower;
}

function starCounter($n) {
    $stars = 1;
    while ($n > 0) {
        $stars += 2;
        $n--;
    }

    return $stars;
}
