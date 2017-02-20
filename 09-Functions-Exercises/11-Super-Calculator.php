<?php
$command = "";
$numsArray = [];
while ($command != "finally"){
    $command = trim(fgets(STDIN));

    switch ($command){
        case "sum":
            $num1 = trim(fgets(STDIN));
            $num2 = trim(fgets(STDIN));
            array_push($numsArray, sum($num1, $num2));
            break;
        case "finally":
            var_dump($numsArray);
            break;
    }
}

function sum($num1, $num2){
    $output = $num1 + $num2;
    return $output;
}
function multiply($num1, $num2){
    $output = $num1 * $num2;
}
function divide($num1, $num2){
    if ($num2 = 0){
        throw new Exception("Division by zero");
    } else {
        $output = $num1 / $num2;
    }
    return $output;
}
function subtract($num1, $num2){
    $output = $num1 - $num2;
};
function factorial($num){
    $output = gmp_fact($num);
    return $output;
}
function root($num){
    if ($num < 0){
        throw new Exception("Can't take the root of a negative number");
    } else {
        $output = sqrt($num);
    }
    return $output;
}
function power($num1, $num2){
    $output = pow($num1, $num2);
    return $output;
}
function absolute($num){
    $output = abs($num);
    return $output;
}
function pythagorean($num1, $num2){

}
function triangle($num1, $num2, $num3){

}
function quadratic($num1, $num2, $num3){

}
function end(&$numsArray){

};