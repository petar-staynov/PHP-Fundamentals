<?php
$input = explode(", ", trim(fgets(STDIN)));
$x1 = $input[0]; $y1 = $input[1];
$x2 = $input[2]; $y2 = $input[3];
$x3 = $input[4]; $y3 = $input[5];

$distance1_2 = distance($x1, $y1, $x2, $y2);
$distance1_3 = distance($x1, $y1, $x3, $y3);
$distance2_3 = distance($x2, $y2, $x3, $y3);

$distances = ["1" => "$distance1_2", "3" => "$distance1_3", "2"=>"$distance2_3"];

$distances = custom_sort($distances);
$output = "";

foreach ($distances as $key => $value){
    echo "$key => $value\n";
}

function distance ($x1, $y1, $x2, $y2){
    $distance = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    return $distance;
}
function custom_sort(&$array ){
    asort($array);
    return $array;
}