<?php
rotateImage(array(array(1,2,3),array(4,5,6),array(7,8,9)));


function rotateImage($a) {
    $rotated = array();
    for($i=0;$i < count($a); $i++){
        for($j=0; $j < count($a[$i]); $j++) {
            //$rotated[$j][count($a)-1-$i] = $a[$i][$j];
            $rotated[$i][$j] = $a[count($a)-1-$j][$i];
        }
    }
    print_r($a);
    echo "</br>";
    print_r($rotated);
}