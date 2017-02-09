<?php
    $arr = explode(" ", trim(fgets(STDIN)));
    $rotations = trim(fgets(STDIN));

    $rotated = $arr;
    $sum = [];


    for($i = 0; $i < $rotations; $i++){
        array_unshift($rotated, $rotated[count($rotated)-1]);
        array_pop($rotated);

        for ($j = 0; $j < count($rotated); $j++){
            $sum[$j]  = $sum[$j] + $rotated[$j];
        }
    }

    echo implode(" ", $sum) . "\n";