<form action="SumOfDigits.php" method="post">
    Input string: <input type="text" name="string">
    <input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])){
    $string = $_POST['string'];$numbers = explode(", ", $string);

    $html = "<table>";

    foreach ($numbers as $number){
        $html .= "<tr><td>$number</td>";

        $singleNums = str_split($number);
        $sum = 0;

        if (is_numeric($number)){
            foreach ($singleNums as $singleNum){
                $sum += $singleNum;
            }
            $html .= "<td>$sum</td>";
            $html .= "</tr>";
        }
        else {
            $html .= "<td>I cannot sum that</td>";
            $html .= "</tr>";
        }
    }
    $html .= "</table>";
echo $html;
}
?>

<style>
    table, th, td {
        border: 1px solid black;
        text-align: left;
    }
</style>