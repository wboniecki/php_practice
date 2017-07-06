<?php
//20/20 hidden: 20/20
$sudoku_good = array(
    array('.', '.', '.', '1', '4', '.', '.', '2', '.'),
    array('.', '.', '6', '.', '.', '.', '.', '.', '.'),
    array('.', '.', '.', '.', '.', '.', '.', '.', '.'),
    array('.', '.', '1', '.', '.', '.', '.', '.', '.'),
    array('.', '6', '7', '.', '.', '.', '.', '.', '9'),
    array('.', '.', '.', '.', '.', '.', '8', '1', '.'),
    array('.', '3', '.', '.', '.', '.', '.', '.', '6'),
    array('.', '.', '.', '.', '.', '7', '.', '.', '.'),
    array('.', '.', '.', '5', '.', '.', '.', '7', '.')
);

$sudoku_bad = array(
    array('.', '.', '.', '.', '2', '.', '.', '9', '.'),
    array('.', '.', '.', '.', '6', '.', '.', '.', '.'),
    array('7', '1', '.', '.', '7', '5', '.', '.', '.'),
    array('.', '7', '.', '.', '.', '.', '.', '.', '.'),
    array('.', '.', '.', '.', '8', '3', '.', '.', '.'),
    array('.', '.', '8', '.', '.', '7', '.', '6', '.'),
    array('.', '.', '.', '.', '.', '2', '.', '.', '.'),
    array('.', '1', '.', '2', '.', '.', '.', '.', '.'),
    array('.', '2', '.', '.', '3', '.', '.', '.', '.'),
);

sudoku2($sudoku_good);

function sudoku2($grid) {
    $n = count($grid);
    //check cols have 9 lenght
    if ($n != 9) {
        $isSudoku = false;
    } else {
        $isSudoku = check($grid, $n);
    }
    if($isSudoku){
        echo "TAK";
    } else {
        echo "NIE";
    }
    return $isSudoku;
}

function check($grid, $n) {
    $grid_chunks = array();
    for ($i = 0; $i < $n; $i++) {
        //check row have 9 lenght
        if (count($grid[$i]) > 9) {
            return false;
        }
        //check rows and cols
        $current_row = array();
        $current_col = array();
        $current_chunk = array();

        $current_row = array_count_values($grid[$i]);
        if (!check_array_counts($current_row, $n)) {
            return false;
        }

        $current_col = array_count_values(array_column($grid, $i));
        if (!check_array_counts($current_col, $n)) {
            return false;
        }

        for ($j = 0; $j < $n; $j++) {
            //check digits 1-9 and dots
            if ($grid[$i][$j] != '.' && ($grid[$i][$j] > 9 || $grid[$i][$j] < 1)) {
                return false;
            }
        }

        //make grid chunks from row, ugly form :(
        //|0|1|2| for i<3
        //|3|4|5| for i>2 && i<6
        //|6|7|8| for i>5
        if ($i < 3) {
            $current_chunk = array();
            $current_chunk = array_chunk($grid[$i], 3);
            for ($j = 0; $j < count($current_chunk); $j++) {
                for ($k = 0; $k < 3; $k++) {
                    $grid_chunks[$j][] = $current_chunk[$j][$k];
                }
            }
        }
        if ($i > 2 && $i < 6) {
            $current_chunk = array();
            $current_chunk = array_chunk($grid[$i], 3);
            for ($j = 0; $j < count($current_chunk); $j++) {
                for ($k = 0; $k < 3; $k++) {
                    $grid_chunks[$j+3][] = $current_chunk[$j][$k];
                }
            }
        }
        if ($i > 5) {
            $current_chunk = array();
            $current_chunk = array_chunk($grid[$i], 3);
            for ($j = 0; $j < count($current_chunk); $j++) {
                for ($k = 0; $k < 3; $k++) {
                    $grid_chunks[$j+6][] = $current_chunk[$j][$k];
                }
            }
        }
    }
    //print_r($grid_chunks[8]);
    if(!checkGridChunks($grid_chunks, $n)) {
        return false;
    } else {
        return true;
    }
}

function check_array_counts($arr, $n) {
    $isArrayOk = true;
    echo "</br>";
    for ($i = 0; $i < $n; $i++) {
        if (!empty($arr[$i+1]) && $arr[$i+1] > 1) {
            $isArrayOk = false;
        }
    }
    return $isArrayOk;
}

function checkGridChunks($arr, $n) {
    $isGridOk = true;
    for ($i = 0; $i < count($arr); $i++) {
        if (!check_array_counts(array_count_values($arr[$i]), $n)) {
            $isGridOk = false;
        }
    }
    return $isGridOk;
}
