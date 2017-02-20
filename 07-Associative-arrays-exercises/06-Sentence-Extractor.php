<?php
    $text = trim(fgets(STDIN));
    $word = trim(fgets(STDIN));

    $countMatches = preg_match_all('/[^.!?]*[.!?]/', $text, $sentences);

    foreach ($sentences[0] as $sentence) {
        $needle = "/[^\w]" . $word . "[^\w]/";
        if (preg_match($needle, $sentence) > 0) {
            $sentence = trim($sentence);
            echo $sentence . PHP_EOL;
        }
    }