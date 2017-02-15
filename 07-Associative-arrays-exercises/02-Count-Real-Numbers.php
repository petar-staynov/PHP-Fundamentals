<?php
$input = explode(" ", trim(fgets(STDIN)));
sort($input);
$array = [];

//8 2.5 2.5 8 2.5

for ($i = 0; $i < count($input); $i++){
    $number = "$input[$i]";

    if (!isset($array[$number])){
        $array[$number] = 1;
    } else {
        $array[$number] += 1;
    }
}

foreach ($array as $key => $value) {
    echo $key . " -> " . $value . " times" . PHP_EOL;
}