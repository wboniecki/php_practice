<?php

$a_1 = [121, 144, 19, 161, 19, 144, 19, 11];
$b_1 = [11 * 11, 121 * 121, 144 * 144, 19 * 19, 161 * 161, 19 * 19, 144 * 144, 19 * 19];
comp_2($a_1, $b_1);

//second attempt after this when I realized array can be sorted
function comp_2($a1, $a2) {
    if (is_null($a1) || is_null($a2)) {
        return false;
    } else {
        sort($a1);
        sort($a2);
        $arr = array();
        foreach ($a1 as $n) {
            $arr[] = $n * $n;
        }
        if ($a2 == $arr) {
            return true;
        } else {
            return false;
        }
    }
}

//first attempt - working ok but not good looking :(
function comp_1($a1, $a2) {
    $isTheSame = true;
    if ((empty($a1) || empty($a2)) && (empty($a1) != empty($a2)) || count($a1) != count($a2) || is_null($a1) || is_null($a2)) {
        $isTheSame = false;
    } else {
        foreach ($a1 as $n) {
            if (!in_array(($n * $n), $a2)) {
                $isTheSame = false;
            } else {
                for ($i = 0; $i < count($a2); $i++) {
                    if ($a2[$i] == $n * $n) {
                        $a2[$i] = "OK";
                        break;
                    }
                }
            }
        }
    }
    return $isTheSame;
}
