<?php
$nums = explode(" ", trim(fgets(STDIN)));

$tempArr = [];
$bestArr = [];

for ($i = 0; $i < count($nums); $i++) {
    if ($nums[$i] < $nums[$i + 1]) {
        array_push($tempArr, $nums[$i]);
    } elseif ($i > 0 && $nums[$i] > $nums[$i-1]) {
        array_push($tempArr, $nums[$i]);
        if (count($tempArr) > count($bestArr)) {
            $bestArr = $tempArr;
        }
        $tempArr = [];
    } else {
        $tempArr = [];
    }
    if (count($tempArr) > count($bestArr)) {
        $bestArr = $tempArr;
    }
}

if (count($bestArr) == 0) {
    array_push($bestArr, $nums[0]);
}

$output = implode(" ", $bestArr);
echo "$output\n";
