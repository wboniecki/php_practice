<?php

firstDuplicate3(array(2, 3, 3, 1, 5, 2));

function firstDuplicate3($a) {
    $findValue = -1;
    $winner = array();
    $winner["dupa"] = 5;
    $countArray = array_count_values($a);
    //print_r($countArray);
    for($i=0; $i<count($a); $i++) {
        if($countArray[$a[$i]] > 1) {
            if(!empty($winner[$a[$i]])) {
                $winner[$a[$i]]++;
                if($winner[$a[$i]]>1) {
                    $findValue = $a[$i];
                break;
                }
            } else {
                $winner[$a[$i]] = 1;
            }
        }
    }
    echo $findValue;
    return $findValue;
}



//11/11 hidden: 9/11
function firstDuplicate2($a) {
$tempArray = array();
$findValue = -1;
for($i=0; $i<count($a); $i++) {
        if($i == 0) {
                $tempArray[] = $a[$i];
        } else {
                if($findValue == -1 && in_array($a[$i],$tempArray)) {
                        $findValue = $a[$i];
                } else {
                        $tempArray[] = $a[$i];
                        break;
                }
        }
}
return $findValue;
}

//11/11 hidden: 8/11
function firstDuplicate($a) {
        $tempArray = array();
        $findValue = -1;
        for($i=0; $i<count($a); $i++) {
                echo ($i+1) . "</br>" . PHP_EOL;
                if($i == 0) {
                        $tempArray[] = $a[$i];
                } else {
                        if($findValue==-1) {
                                for($j=0; $j<count($tempArray); $j++) {
                                        if($a[$i] == $tempArray[$j]) {
                                                echo "Znalazlem";
                                                $findValue = $a[$i];
                                        }
                                }
                        $tempArray[] = $a[$i];
                        } else {
                                break;

                        }
                }
        }



        print_r($a);
        echo "</br>" . PHP_EOL;
        print_r($tempArray);
        echo "</br>" . PHP_EOL;
        echo $findValue;
}
