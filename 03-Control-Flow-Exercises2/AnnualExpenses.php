<form action="AnnualExpenses.php" method="post">
    Enter number of years: <input type="text" name="years"><br>
    <input type="submit" name="submit">
</form>

<?php
    if(isset($_POST['submit'])){
        $html = "<table>";
        $html .= "<th>Year</th>";

        //Month Headings
        for ($m =1; $m <= 12; $m++){
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            $html .= "<th>$month</th>";
        }
        $html .= "<th>Total:</th>";

        $years = $_POST['years'];
        $currentYear = date("Y");
        for($i = $currentYear; $i > $currentYear - $years; $i--){
            $html .= "<tr><td>$i</td>";

            $yearSum = 0;
            for($m2 = 1; $m2 <= 12; $m2++){
                $randNum = rand(0,999);
                $yearSum += $randNum;

                $html .= "<td>$randNum</td>";
            }
            $html .= "<td>$yearSum</td>";
            $html .= "</tr>";
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