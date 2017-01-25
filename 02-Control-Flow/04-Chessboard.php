<?php
    $num = 5;
    $html = "<table>";

    for ($row = 1; $row <= $num; $row++){
        $html .= "<tr>";
        for ($col = 1; $col <= $num; $col++){
            $color = "black";
            if ($col % 2 == 0 && $row % 2 != 0) $color = "white";
            else if ($col % 2 != 0 && $row % 2 == 0) $color = "white";
            $html .= "<td height=30px width=30px bgcolor='$color'></span>";
        }
        $html .= "</tr>";
    }
$html .= "</table>";
echo $html;
?>