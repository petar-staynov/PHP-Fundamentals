<?php
    $html = "<table><th>Number</th><th>Square</th>";

    $sum = 0;

    for ($i = 0; $i <= 100; $i++){
        $num = $i;
        $root = round(sqrt($num),2);
        $sum += $root;

        $html .= "<tr>";
        $html .= "<td>$num</td><td>$root</td>";
        $html .= "</tr>";
    }
    $html.= "<tr><td>Total:</td><td>$sum</td></tr>";

echo $html;
?>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: left;
    }
</style>
