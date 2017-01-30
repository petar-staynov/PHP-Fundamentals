<?php
    $rows = 5;
    $cols = 5;
    $num = 0;

    $matrix = [];
    for ($row = 0; $row < $rows; $row++){
        $matrix[$row] = [];
        for ($col = 0; $col < $cols; $col++){
            $matrix[$row][$col] = $num;
            $num++;
        }
    }
    $html = "<table>";
    for($row2 = 0; $row2 < $rows; $row2++){
        $html.="<tr>";
        for ($col2 = 0; $col2 < $cols; $col2++){
            $html.="<td>" . $matrix[$row2][$col2] . "</td>";
        }
        $html.="</tr>";
    }
    $html.="</table>";
echo $html;