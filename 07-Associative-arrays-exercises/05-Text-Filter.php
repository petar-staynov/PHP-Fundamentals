<?php
$text = trim(fgets(STDIN));
$banlist = explode(", ", trim(fgets(STDIN)));


for ($i = 0; $i < count($banlist); $i++){
    $asterisk = "";
    while (strlen($asterisk) < strlen($banlist[$i])){
        $asterisk .= "*";
    }
    $text = str_replace($banlist[$i], $asterisk, $text);
}

echo $text;