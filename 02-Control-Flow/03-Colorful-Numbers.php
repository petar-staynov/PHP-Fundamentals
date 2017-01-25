<?php
    $num = 10;
    $html = "<ul>";
    for ($i = 1; $i <= $num; $i++){
        if ($i % 2 == 0) $color = "blue";
        else $color = "green";
        $html .= "<li><span style ='color:$color'>$i</span></li>";
    }
    $html .= "</ul>";
echo $html;

//+= is incompatible in PHP7.1  Use .= for strings instead