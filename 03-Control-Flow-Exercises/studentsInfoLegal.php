<form method="get">
    <select name="delimiter">
        <option value=",">,</option>
        <option value="|">|</option>
        <option value="&">&</option>
    </select><br>
    Name: <input type="text" name="names"/> <br>
    Ages: <input type="text" name="ages"/><br>
    <input type="submit" name="filter" value="Filter"/><br>
</form>

<?php
if (isset($_GET['filter'])) {
    $delimiter = $_GET['delimiter'];
    $namesString = $_GET['names'];
    $agesString = $_GET['ages'];

    $namesArr = explode($delimiter, $namesString);
    $agesArr = explode($delimiter, $agesString);

    $html = "";

    if ($namesString && $agesString) {
        $html = "<table>";
        $html .= "<th>Name</th><th>Age</th>";
        for ($i = 0; $i < count($namesArr); $i++) {
            if ($agesArr[$i] >= 18){
                $html .= "<tr><td>$namesArr[$i]</td><td>$agesArr[$i]</td></tr>";
            }
        }
    }
    echo $html;
}
?>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: left;
    }
</style>