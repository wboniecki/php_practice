<?php

firstNotRepChar("abacabad");

function firstNotRepChar($s) {
    $split = preg_split('/(?<!^)(?!$)/u', $s);
    $findChar = " ";
    $countArray = array_count_values($split);
    print_r($countArray);
    for($i=0; $i<count($split); $i++) {
        if($countArray[$split[$i]] == 1) {
            $findChar = $split[$i];
            break;
        }
    }
    echo $findChar;
    return $findChar;
}
