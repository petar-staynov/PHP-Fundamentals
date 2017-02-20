<?php
$number = trim(fgets(STDIN));
$operations = explode(", ", trim(fgets(STDIN)));

for ($i = 0; $i < count($operations); $i++){
    $number = kitchen($number, $operations[$i]);
    echo $number . PHP_EOL;
}

function kitchen ($num, $action){
    switch ($action){
        case "chop":
            $num = $num/2;
            break;
        case "dice":
            $num = sqrt($num);
            break;
        case "spice":
            $num++;
            break;
        case "bake":
            $num = $num * 3;
            break;
        case "fillet":
            $num = $num - (0.2*$num);
            break;
        default:
            return "Invalid action";
    }
    return $num;
}