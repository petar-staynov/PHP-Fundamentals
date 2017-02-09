<?php
$input = explode(" ", trim(fgets(STDIN)));

$leftSum = 0;
$rightSum = 0;
$found = false;

for($currentEle = 0; $currentEle < count($input); $currentEle++){
    //LEFT SUM
    for ($i = $currentEle-1; $i >= 0; $i--){
        $leftSum+=(int)$input[$i];
    }

    //RIGHT SUM
    for ($i2 = $currentEle+1; $i2 < count($input); $i2++){
        $rightSum+=$input[$i2];
    }
    if ($rightSum == $leftSum){
        echo "$currentEle\n";
        $found = true;
        break;
    } else {
        $found = false;
        $leftSum = 0;
        $rightSum = 0;
    }
}

if (!$found){
    echo "no\n";
}