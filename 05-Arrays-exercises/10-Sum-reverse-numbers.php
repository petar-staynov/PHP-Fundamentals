<?php
$arr = explode(" ", trim(fgets(STDIN)));
$sum = 0;

for($i = 0; $i < count($arr); $i++){
    $arr[$i] = strrev($arr[$i]);
    $arr[$i] = (double)$arr[$i];
    $sum+=$arr[$i];
}
echo $sum . "\n";