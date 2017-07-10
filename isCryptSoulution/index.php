<?php
//in codefights 4/10 dont know why in project have correct answer but in CF is not ;/

isCryptSolution(array("SEND", "MORE", "MONEY"), array(
    "O" => "0",
    "M" => "1",
    "Y" => "2",
    "E" => "5",
    "N" => "6",
    "D" => "7",
    'R' => "8",
    "S" => "9"));

isCryptSolution(array("TEN", "TWO", "ONE"), array(
    "O" => "1",
    "T" => "0",
    "W" => "9",
    "E" => "5",
    "N" => "4"
));

isCryptSolution(array("ONE", "ONE", "TWO"), array(
    "O" => "2",
    "T" => "4",
    "W" => "6",
    "E" => "1",
    "N" => "3"
));

isCryptSolution(array("ONE", "ONE", "TWO"), array(
    "O" => "0",
    "T" => "1",
    "W" => "2",
    "E" => "5",
    "N" => "6"
));

isCryptSolution(array("A", "A", "A"), array(
    "A" => "0"
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

    print_r($value_arr[0] + $value_arr[1]);
    echo "</br>";
    if ($value_arr[0] + $value_arr[1] != $value_arr[2]) {
        $isSolution = false;
    }
    for ($i = 0; $i < 2; $i++) {
        $isZero = str_split($value_arr[$i]);
        print_r($isZero[0]);
        if ($isZero[0] == 0) {
            echo "false";
            $isSolution = false;
        }
    }
    if ($isSolution) {
        echo "tru";
    } else {
        echo "nie tru";
    }
    return $isSolution;
}
