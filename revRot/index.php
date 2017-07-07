<?php

//revrot("123456987654", 6);
//revrot("66443875", 4);
//revrot("1234", 0);
//revrot("123456987653", 6);
revrot("733049910872815764", 5);

function revRot($s, $sz) {
    $new_string = "";
    if ($sz > 0 && $s != "" && $sz < strlen($s)) {
        $arr = str_split($s, $sz);
        print_r($arr);
        echo "</br>";

        for ($i = 0; $i < count($arr); $i++) {
            if (strlen($arr[$i]) == $sz) {
                $tmp = array();
                $tmp_sum = 0;
                $tmp = str_split($arr[$i]);

                for ($j = 0; $j < count($tmp); $j++) {
                    $tmp_sum += $tmp[$j];
                }

                if ($tmp_sum % 2 == 0) {
                    $arr[$i] = strrev($arr[$i]);
                } else {

                    $arr[$i] = substr($arr[$i], 1) . substr($arr[$i], 0, 1);
                }
                $new_string .= $arr[$i];
            }
        }
    }
    print_r($new_string);
    echo "</br>";
    return $new_string;
}
