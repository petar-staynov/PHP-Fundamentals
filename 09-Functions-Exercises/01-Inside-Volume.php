<?php
$x1=10; $x2=50;
$y1=20; $y2 = 80;
$z1=15; $z2 = 50;

$input = explode(", ", trim(fgets(STDIN)));
//var_dump($input);

for ($i=0; $i < count($input); $i+=3){
    $x = $input[$i];
    $y = $input[$i+1];
    $z = $input[$i+2];
    echo volume($x, $y, $z);
}

function volume($x, $y, $z) : string {
    global $x1;
    global $x2;
    global $y1;
    global $y2;
    global $z1;
    global $z2;

    if ($x>=$x1
    && $x <= $x2
    && $y >= $y1
    && $y <= $y2
    && $z >= $z1
    && $z <= $z2){
        return "inside" . PHP_EOL;
    } else {
        return "outside" . PHP_EOL;
    }
}
