<?php
$input = trim(fgets(STDIN));
$input = str_split($input);

$average = getAverage($input);
while ($average < 5){
    array_push($input, 9);
    $average = getAverage($input);
}

function getAverage(&$input){
    $average = 0;
    for ($i=0; $i < count($input); $i++){
        $average += $input[$i];
    }
    $count = count($input);
    $average = (double)$average / (double)$count;
    return $average;
}
echo implode($input);