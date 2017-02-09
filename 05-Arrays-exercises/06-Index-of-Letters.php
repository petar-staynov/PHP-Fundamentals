<?php
$arr = trim(fgets(STDIN));
$arr = strtolower($arr);

$alphabet = [];
for ($i = 'a'; $i < 'z'; $i++){
    array_push($alphabet, $i);
}
array_push($alphabet, 'z');

for ($letter = 0; $letter < strlen($arr); $letter++){
    for($alphabetLetter = 0; $alphabetLetter < count($alphabet); $alphabetLetter++){
        if ($arr[$letter] == $alphabet[$alphabetLetter]){
            echo "$arr[$letter] -> $alphabetLetter\n";
        }
    }
}

