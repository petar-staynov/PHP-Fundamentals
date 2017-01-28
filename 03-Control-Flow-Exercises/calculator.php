<?php
if (isset($_GET['calculate'])){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operation = $_GET['operation'];
    $output = "";

    switch ($operation){
        case "sum": $output = $num1+$num2; break;
        case "subtract": $output = $num1-$num2; break;
        default: $output = "Error";
    }
}

include_once "calculator_frontend.php";