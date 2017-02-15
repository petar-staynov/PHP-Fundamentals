<?php
    $input = explode(" ", trim(fgets(STDIN)));

    $input = implode("", $input);
    $input = strrev($input);

    echo $input;