<?php
$nums = explode(" ", trim(fgets(STDIN)));

$count = 0;
$bestCount = 0;
$bestNumber = $nums[0];

for ($i = 0; $i < count($nums); $i++){
    for ($k = 0; $k < count($nums); $k++){
        if ($nums[$i] == $nums[$k]){
            $count++;
        }
    }
    if ($count > $bestCount){
        $bestNumber = $nums[$i];
        $bestCount = $count;
    }
    $count = 0;
}

echo $bestNumber . "\n";
