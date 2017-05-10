<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Problem02</title>
</head>
<body>
<b>Input:</b>
<form action="02.%20Working%20Days.php" method="get">
    <input name='dateOne' size="100"
           value="17-12-2014"><br>
    <input name='dateTwo' size="100"
           value="31-12-2014"><br>
    <input name='holidays' size="100"
           value="31-12-2014 24-12-2014 08-12-2014"><br>
    <input type="submit">
</form>
</body>
</html>

<?php
//setlocale(LC_ALL, 'bg_BG.UTF-8');
if (isset($_GET['dateOne']) && isset($_GET['dateTwo']) && isset($_GET['holidays'])) {
    // Start date
    $date = $_GET['dateOne'];
    // End date
    $end_date = $_GET['dateTwo'];

    $holidayList = explode("\n", $_GET['holidays']);
    foreach ($holidayList as $item) {
        $item = trim($item);
    }

    $outputDates = [];

    while (strtotime($date) <= strtotime($end_date)) {
        if(isWeekend($date)){
//            echo $date . "is a weekend" . "<br>";
            $date = date("d-m-Y", strtotime("+1 day", strtotime($date)));
        }
        elseif (isHoliday($date, $holidayList)){
//            echo $date . "is a holiday";
            $date = date("d-m-Y", strtotime("+1 day", strtotime($date)));
        }
        else {
//            echo "$date" . "<br>";
            $outputDates[] = $date;
            $date = date("d-m-Y", strtotime("+1 day", strtotime($date)));
        }


    }

    if (count($outputDates) > 0){
        echo "<ol>";
        foreach ($outputDates as $outputDate) {
            echo "<li>$outputDate</li>";
        }
        echo "</ol>";
    } else{
        echo "<h2>No workdays</h2>";
    }

}

function isWeekend($date){
    return (date('N', strtotime($date)) >= 6);
}

function isHoliday($date, $holidayList){
    $isHoliday = false;
    foreach ($holidayList as $holidayDate){
        if(strtotime($holidayDate) == strtotime($date)){
            $isHoliday = true;
        }
    }
    return $isHoliday;
}