<?php
$nums = explode(" ", trim(fgets(STDIN)));

function add (&$array, $index, $element){
    array_splice($array, $index, 0, "$element");
    return $array;
};
function addMany (&$array, $index, $elements){
    for ($i = 0; $i < count($elements); $i++){
        array_splice($array, $index, 0, $elements[count($elements)-1-$i]);
    }
    return $array;
};
function contains (&$nums, $element){
    $found = -1;
    for ($i = 0; $i < count($nums); $i++){
        if ($element == $nums[$i]){
            $found = $i;
            break;
        }
    }
    return $found;
};
function remove (&$array, $index){
    array_splice($array, $index, 1, null);
    return $array;
};
function shift(&$array, $elements){
    $tempArr = [];
    for ($i = 0; $i < $elements; $i++){
        array_push($tempArr, $array[0]);
        array_shift($array);
        array_push($array, $tempArr[$i]);
    }
    $tempArr = [];
    return $array;
};
function sumPairs(&$array){
    $tempArr = [];
    for ($i = 0; $i < count($array); $i+=2){
        $tempElement  = (double)$array[$i] + (double)$array[$i+1];
        array_push($tempArr, $tempElement);
    }
    return $tempArr;
};

$working = true;
while ($working){
    $command = explode(" ", trim(fgets(STDIN)));

    if ($command[0] == "print"){
        echo "[" . implode(", ", $nums) . "]" . "\n";
        break;
    }
    elseif ($command[0] == "add"){
        $index = $command[1];
        $element = $command[2];
        $nums = add($nums, $index, $element);
    }
    elseif ($command[0] == "addMany"){
        $elements = [];
        $index = $command[1];

        for ($i = 2; $i < count($command); $i++){
            array_push($elements, $command[$i]);
        }
        $nums = addMany($nums, $index, $elements);
    }
    elseif ($command[0] == "contains"){
        $element = $command[1];
        echo contains($nums, $element) . "\n";
    }
    elseif ($command[0] == "remove"){
        $index = $command[1];
        $nums = remove($nums, $index);
    }
    elseif ($command[0] == "shift"){
        $shifts = $command[1];
        $nums = shift($nums, $shifts);
    }
    elseif ($command[0] == "sumPairs"){
        $nums = sumPairs($nums);
    }
    elseif ($command[0] == "dump"){
        var_dump($nums);
    }
}