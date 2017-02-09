<?php
$nums = explode(" ", trim(fgets(STDIN)));

$tempArr = [];
$bestArr = [];

for ($i = 0; $i < count($nums) - 1; $i++) {
    if ($nums[$i] == $nums[$i + 1]) {
        array_push($tempArr, $nums[$i]);
    } else {
        $tempArr = [];
    }
    if (count($tempArr) > count($bestArr)) {
        $bestArr = $tempArr;
    }
}


if (count($bestArr) == 0) {
    array_push($bestArr, $nums[0]);
} else {
    array_push($bestArr, $bestArr[0]);
}
$output = implode(" ", $bestArr);
echo "$output\n";
