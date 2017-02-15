<?php
    $str = 'Hello, 你好，你怎么样,السلام عليكم , здрасти';

    for ($i = 0; $i < mb_strlen($str); $i++){
        $letter = mb_substr($str, $i, 1);
        echo $letter . PHP_EOL;
    }
