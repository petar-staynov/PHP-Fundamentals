<?php
    $input = "Learning PHP is fun PHP";
    $input = strtoupper($input);

    $letters = [];

    for ($i = 0; $i < strlen($input); $i++){
        $char = $input[$i];

        if (ord($char) >= ord('A') && ord($char) <= ord('Z')){
            if (isset($letters[$char])){
                $letters[$char]++;
            } else {
                $letters[$char] = 1;
            }
        }
    }
    print_r($letters);