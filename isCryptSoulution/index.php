<?php

isCryptSolution(array("SEND", "MORE", "MONEY"), array(
    'O' => '0',
    'M' => '1',
    'Y' => '2',
    'E' => '5',
    'N' => '6',
    'D' => '7',
    'R' => '8',
    'S' => '9'
));
//partly work
function isCryptSolution($crypt, $solution) {
    //print_r($solution);
    //$crypt - An array of three non-empty strings containing only uppercase English letters.
    //print_r($solution['M']);
    $isSolution = true;
    $value_arr = array();
    foreach ($crypt as $s) {
        $tmpArr = str_split($s);
        $tmpValue = "";

        foreach ($tmpArr as $char) {
            echo $char;
            if (!empty($solution[$char]) || $solution[$char] == 0) {
                echo $solution[$char];
                $tmpValue .= $solution[$char];
            } else {
                $isSolution = false;
                break;
            }
        }
        echo "</br>";
        $value_arr[] = $tmpValue;
    }
    print_r($value_arr);
    
    if($value_arr[0]+$value_arr[1] != $value_arr[2]) {
        $isSolution = false;
    }
    
    return $isSolution;
}
