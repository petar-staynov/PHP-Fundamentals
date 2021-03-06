<?php
//    $arr1 = explode(" ", trim(fgets(STDIN)));
//    $arr2 = explode(" ", trim(fgets(STDIN)));
//
//    $index = min(count($arr1), count($arr2));
//
//    $commonEnd = 0;
//    $largestEnd = 0;
//
//    //Left to right
//    for ($i=0; $i < $index; $i++) {
//        if ($arr1[$i] == $arr2[$i]){
//            $commonEnd++;
//        }
//    }
//    if ($commonEnd > $largestEnd){
//        $largestEnd = $commonEnd;
//    }
//
//    //Right to left
//    $commonEnd = 0;
//    $arr1 = array_reverse($arr1);
//    $arr2 = array_reverse($arr2);
//
//    for ($j=0; $j < $index; $j++) {
//        if ($arr1[$j] == $arr2[$j]){
//            $commonEnd++;
//        }
//    }
//    if ($commonEnd > $largestEnd){
//        $largestEnd = $commonEnd;
//    }
//
//    echo "$largestEnd\n";

$arrA = array_filter(explode(' ', fgets(STDIN)));
$arrB = array_filter(explode(' ', fgets(STDIN)));
$best = 0;
$current = countCommon($arrA, $arrB);
$best = $current > $best ? $current : $best;
$arrA = array_reverse($arrA);
$arrB = array_reverse($arrB);
$current = countCommon($arrA, $arrB);
$best = $current > $best ? $current : $best;
echo $best;
function countCommon($arrA, $arrB)
{
    $length = min(count($arrA), count($arrB));
    $current = 0;
    for ($i = 0; $i < $length; $i++) {
        if ($arrA[$i] == $arrB[$i]) {
            $current++;
        } else {
            break;
        }
    }
    return $current;
}