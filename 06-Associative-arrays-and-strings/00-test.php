<?php
$text = "The quick brown fox";
$regex = "/\W+/"; //splits by non word
$tokens = preg_split($regex, $text, -1, PREG_SPLIT_NO_EMPTY);
echo json_encode($tokens);
