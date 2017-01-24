<?php
    date_default_timezone_set("Europe/Sofia");


    $yearEnd = date('Y-m-d H:i:s', strtotime('12/31 23:59:59'));
    $currentDate = date('Y-m-d H:i:s');

    echo "End of year date: ". $yearEnd;
    echo "<br>";
    echo "Current date: " . $currentDate;
    echo "<br>";

    $seconds = strtotime($yearEnd) - strtotime($currentDate);
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / (3600*24));

    echo "Hours until new year : {$hours}" . "<br>";
    echo "Minutes until new year : {$minutes}" . "<br>";
    echo "Seconds until new year : {$seconds}" . "<br>";
    echo "{$days}:{$hours}:{$minutes}:{$seconds} ";