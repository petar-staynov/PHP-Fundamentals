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
session_start(); //Starts session storage

//Initial Filter button start
if (isset($_GET['filter'])) {
    $delimiter = $_GET['delimiter'];
    $namesString = $_GET['names'];
    $agesString = $_GET['ages'];

    $namesArr = explode($delimiter, $namesString);
    $agesArr = explode($delimiter, $agesString);

    $html = "";

    $_SESSION['delimiter'] = $delimiter;
    $_SESSION['namesArr'] = $namesArr;
    $_SESSION['agesArr'] = $agesArr;

    if ($namesString && $agesString) {
        $html = "<table>";
        $html .= "<th>Name</th><th>Age</th>";

        $startRow = 0;
        $_SESSION['startRow'] = $startRow;
        $maxRows = count($namesArr);
        $_SESSION['maxRows'] = $maxRows;
        $endRow = 5;
        if ($endRow > $maxRows) $endRow = $maxRows;
        $_SESSION['endRow'] = $endRow;

        $currentEntry = $startRow;

        if (count($namesArr) != count($agesArr)){
            $html = "<h1>Number of Names and Ages is not equal</h1>";
        }
        else if (count($namesArr) <= 5){
            for($row = $startRow; $row < $endRow; $row++){//If entries are five or less, make it single page
                $html .= "<tr><td>$namesArr[$currentEntry]</td><td>$agesArr[$currentEntry]</td></tr>";
                $currentEntry++;
            }
            $html .= "</table>";
            $html.="<form action='studentsInfoPaging.php' method='get'>
                <input type='submit' name='submitPrev' value='Prev' disabled/>
                <input type='submit' name='submitNext' value='Next' disabled/>
                </form>";
        }
        else {
            for($row = $startRow; $row < $endRow; $row++){
                $html .= "<tr><td>$namesArr[$currentEntry]</td><td>$agesArr[$currentEntry]</td></tr>";
                $currentEntry++;
            }
            $html .= "</table>";
            $html.="<form action='studentsInfoPaging.php' method='get'>
                <input type='submit' name='submitPrev' value='Prev' disabled/>
                <input type='submit' name='submitNext' value='Next'/>
                </form>";
        }
    }
    echo $html;
}

//Clicking the next button
if(isset($_GET['submitNext'])){
    $delimiter = $_SESSION['delimiter'];
    $namesArr = $_SESSION['namesArr'];
    $agesArr = $_SESSION['agesArr'];

    $html = "<table>";
    $html .= "<th>Name</th><th>Age</th>";

    //Moves for loop indexes +5
    $startRow = $_SESSION['startRow'] + 5;
    $endRow = $_SESSION['endRow'] + 5;
    $maxRows = $_SESSION['maxRows'];

    $currentEntry = $startRow;

    if ($endRow >= $maxRows){ //Disables next button if current endIndex is bigger or equal to the max index possible
        for($row = $startRow; $row < $maxRows; $row++){
            $html .= "<tr><td>$namesArr[$currentEntry]</td><td>$agesArr[$currentEntry]</td></tr>";
            $currentEntry++;
        }
        $html .= "</table>";
        $html.="<form action='studentsInfoPaging.php' method='get'>
                <input type='submit' name='submitPrev' value='Prev'/>
                <input type='submit' name='submitNext' value='Next' disabled/>
                </form>";
    }
    else if ($endRow <= $maxRows){
        for($row = $startRow; $row < $endRow; $row++){
            $html .= "<tr><td>$namesArr[$currentEntry]</td><td>$agesArr[$currentEntry]</td></tr>";
            $currentEntry++;
        }
        $html .= "</table>";
        $html.="<form action='studentsInfoPaging.php' method='get'>
                <input type='submit' name='submitPrev' value='Prev'/>
                <input type='submit' name='submitNext' value='Next'/>
                </form>";
    }

    //Updates for loop indexes
    $_SESSION['startRow'] = $startRow;
    $_SESSION['endRow'] = $endRow;
    echo $html;
}

//Clicking the previous button
if(isset($_GET['submitPrev'])){
    $delimiter = $_SESSION['delimiter'];
    $namesArr = $_SESSION['namesArr'];
    $agesArr = $_SESSION['agesArr'];

    $html = "<table>";
    $html .= "<th>Name</th><th>Age</th>";

    //Moves for loop indexes -5
    $startRow = $_SESSION['startRow'] - 5;
    $endRow = $_SESSION['endRow'] - 5;

    $maxRows = $_SESSION['maxRows'];

    $currentEntry = $startRow;

    if ($startRow == 0){//Disables Prev button if gone back to first page
        for($row = $startRow; $row < $endRow; $row++){
            $html .= "<tr><td>$namesArr[$currentEntry]</td><td>$agesArr[$currentEntry]</td></tr>";
            $currentEntry++;
        }
        $html .= "</table>";
        $html.="<form action='studentsInfoPaging.php' method='get'>
                <input type='submit' name='submitPrev' value='Prev' disabled/>
                <input type='submit' name='submitNext' value='Next'/>
                </form>";
    }
    else {
        for($row = $startRow; $row < $endRow; $row++){
            $html .= "<tr><td>$namesArr[$currentEntry]</td><td>$agesArr[$currentEntry]</td></tr>";
            $currentEntry++;
        }
        $html .= "</table>";
        $html.="<form action='studentsInfoPaging.php' method='get'>
                <input type='submit' name='submitPrev' value='Prev'/>
                <input type='submit' name='submitNext' value='Next'/>
                </form>";
    }

    //Updates for loop indexes
    $_SESSION['startRow'] = $startRow;
    $_SESSION['endRow'] = $endRow;
    echo $html;
}
?>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: left;
    }
</style>