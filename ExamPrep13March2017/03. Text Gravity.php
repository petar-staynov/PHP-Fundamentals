<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Problem03</title>
</head>
<body>
<b>Input:</b>
<form action="03.%20Text%20Gravity.php" method="get">
    <input name='text' size="100"
           value="The Milky Way is the galaxy that contains our star system"><br>
    <input name='lineLength' size="100"
           value="10"><br>
    <input type="submit">
</form>
</body>
</html>

<?php
if (isset($_GET['text']) && isset($_GET['lineLength'])) {
    $text = $_GET['text'];
    $maxLineLength = intval($_GET['lineLength']);

    $matrix = [];

    $row = 0;
    $col = 0;

    //Matrix filler
    for ($char = 0; $char < strlen($text); $char++) {
        $matrix[$row][$col] = $text[$char];
        $col++;

        //adds fields to last row
        if ($char == strlen($text) - 1) {
            $difference = $maxLineLength - count($matrix[$row]);
            for ($bonus = 0; $bonus < $difference; $bonus++) {
                $matrix[$row][$col] = ' ';
                $col++;
            }
        }
        //moves to new row
        if ($col == $maxLineLength) {
            $row++;
            $col = 0;
        }
    }

    //Matrix gravity
    $row = 0;
    $col = 0;
    for ($col = 0; $col < $maxLineLength; $col++){
        $spaces = 0;
        for ($row = count($matrix)-1; $row >= 0; $row--){
            if ($matrix[$row][$col] == ' '){
                $spaces++;
            } else {
                $char = $matrix[$row][$col];
                $matrix[$row][$col] = " ";
                $matrix[$row+$spaces][$col] = $char;
            }
        }
    }

    //matrix printer
    $row = 0;
    $col = 0;
    echo "<table>";
    for ($row = 0; $row < count($matrix); $row++) {
        echo "<tr>";
        for ($col = 0; $col < count($matrix[$row]); $col++) {
            echo "<td>" . $matrix[$row][$col] . "</td>";
        }
        echo "</tr>";
    }
    echo "<table>";
}
?>
<style>
    table {
        border: medium
    }
</style>

<table border="1">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>M</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>h</td>
        <td>e</td>
        <td></td>
        <td>i</td>
        <td>i</td>
        <td>l</td>
        <td></td>
        <td>y</td>
        <td></td>
    </tr>
    <tr>
        <td>T</td>
        <td>a</td>
        <td>y</td>
        <td>l</td>
        <td>a</td>
        <td>s</td>
        <td>y</td>
        <td>k</td>
        <td>h</td>
        <td>e</td>
    </tr>
    <tr>
        <td>W</td>
        <td>g</td>
        <td>a</td>
        <td>c</td>
        <td>o</td>
        <td>x</td>
        <td>t</td>
        <td>t</td>
        <td>t</td>
        <td>h</td>
    </tr>
    <tr>
        <td>a</td>
        <td>t</td>
        <td>o</td>
        <td>u</td>
        <td>r</td>
        <td>n</td>
        <td>s</td>
        <td>a</td>
        <td>i</td>
        <td>n</td>
    </tr>
    <tr>
        <td>s</td>
        <td>s</td>
        <td>y</td>
        <td>s</td>
        <td>t</td>
        <td>e</td>
        <td>m</td>
        <td>t</td>
        <td>a</td>
        <td>r</td>
    </tr>
</table>
<table border="1">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>M</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    <tr>
        <td></td>
        <td>h</td>
        <td>e</td>
        <td></td>
        <td>i</td>
        <td>i</td>
        <td>l</td>
        <td></td>
        <td>y</td>
        <td></td>
    <tr>
        <td>T</td>
        <td>a</td>
        <td>y</td>
        <td>l</td>
        <td>a</td>
        <td>s</td>
        <td>y</td>
        <td>k</td>
        <td>h</td>
        <td>e</td>
    <tr>
        <td>W</td>
        <td>g</td>
        <td>a</td>
        <td>c</td>
        <td>o</td>
        <td>x</td>
        <td>t</td>
        <td>t</td>
        <td>t</td>
        <td>h</td>
    <tr>
        <td>a</td>
        <td>t</td>
        <td>o</td>
        <td>u</td>
        <td>r</td>
        <td>n</td>
        <td>s</td>
        <td>a</td>
        <td>i</td>
        <td>n</td>
    <tr>
        <td>s</td>
        <td>s</td>
        <td>y</td>
        <td>s</td>
        <td>t</td>
        <td>e</td>
        <td>m</td>
        <td>t</td>
        <td>a</td>
        <td>r</td>
</table>

