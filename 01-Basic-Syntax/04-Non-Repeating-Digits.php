<?php
    $num = 1234;

    if ($num < 100) echo "no";
    else {
        for ($i = 100; $i <= $num; $i++){
            $string = "$i";

            if ($string[0] != $string[1] &&
                $string[0] != $string[2] &&
                $string[1] != $string[2] &&
                $i < 1000){
                echo $string . ", ";
            }
        }
    }