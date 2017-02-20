<?php
$speed = trim(fgets(STDIN));
$area = trim(fgets(STDIN));

$speedLimit = getLimit($area);
$infraction = getInfraction($speed, $speedLimit);
echo $infraction;

function getLimit($area){
    switch ($area){
        case "motorway":
            $speedLimit = 130;
            break;
        case "interstate":
            $speedLimit = 90;
            break;
        case "city":
            $speedLimit = 50;
            break;
        case "residential":
            $speedLimit = 20;
            break;
        default:
            echo "Not a valid input";
            $speedLimit = 9999;
    }
    return $speedLimit;
}
function getInfraction($speed, $speedLimit){
    $difference = $speed - $speedLimit;
    if ($difference < 0){
        return "";
    } elseif ($difference >= 0 && $difference <= 20){
        return "speeding";
    } elseif ($difference > 20 && $difference <= 40){
        return "excessive speeding";
    } elseif ($difference > 40){
        return "reckless driving";
    }
}