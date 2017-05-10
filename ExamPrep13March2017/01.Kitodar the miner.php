<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Problem01</title>
</head>
<body>
<b>Input:</b>
<form action="01.Kitodar%20the%20miner.php" method="get">
    <input name='data' size="100"
           value=" mine bobovDol gold 10, mine medenRudnik silver 22, mine chernoMore shrimps 24, gold 50"><br>
    <input type="submit">
</form>
</body>
</html>

<?php
if (isset($_GET['data'])) {
    $input = $_GET['data'];
    $input = explode(",", $input);

    $arr['gold']['Quantity'] = 0;
    $arr['silver']['Quantity'] = 0;
    $arr['diamonds']['Quantity'] = 0;

    foreach ($input as $command) {
        //removes white spaces
        $commandString = trim($command);
        $commandArr = explode(' ', $commandString);

        $action = trim($commandArr[0]);
            if ($action != 'mine') {
                continue;
            }
//            echo $action . PHP_EOL;

            $mineName = trim($commandArr[1]);
            if ($mineName == '' || $mineName === null) {
                continue;
            }
//            echo $mineName . PHP_EOL;

            $typeOfOre = strtolower(trim($commandArr[2]));
            if ($typeOfOre == '' ||
                $typeOfOre === null ||
                $typeOfOre != "gold" &&
                $typeOfOre != 'silver' &&
                $typeOfOre != 'diamonds') {
                continue;
            }
//            echo $typeOfOre . PHP_EOL;

            $quantity = intval(trim($commandArr[3]));
            if ($quantity == '' || $quantity === null) {
                continue;
            }
//            echo $quantity . PHP_EOL;
//            echo "<hr>";

            if (!array_key_exists($typeOfOre, $arr)) {
                $arr[$typeOfOre]['Quantity'] = $quantity;
            } else {
                $newQuantity = $arr[$typeOfOre]['Quantity'] + $quantity;
                $arr[$typeOfOre]['Quantity'] = $newQuantity;
            }
    }
    $output = "<p>*Gold: ". $arr['gold']['Quantity'] . "</p>";
    $output .= "<p>*Silver: ". $arr['silver']['Quantity'] . "</p>";
    $output .= "<p>*Diamonds: ". $arr['diamonds']['Quantity'] . "</p>";

    echo $output;
}
