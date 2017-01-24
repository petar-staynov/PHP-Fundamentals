<?php
    $month_ini = new DateTime("first day of last month");
    $month_end = new DateTime("last day of last month");

    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($month_ini, $interval, $month_end);


    foreach ($daterange as $date) {
        $sunday = date('w', strtotime($date->format("Y-m-d")));
        if ($sunday == 0) {
            echo $date->format("Y-m-d") . "<br>";
        } else {
            echo'';
        }
}