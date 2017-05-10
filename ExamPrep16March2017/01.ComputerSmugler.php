<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Problem01</title>
</head>
<body>
<b>Input:</b>
<form action="01.ComputerSmugler.php" method="get">
    <input name='list' size="100"
           value="CPU, RAM, VIA, ROM, RAM, RAM, CPU, CPU, CPU, VIA, ROM, ROM, CPU"><br>
    <input type="submit">
</form>
</body>
</html>

<?php
if (isset($_GET['list'])) {
    $input = $_GET['list'];
    $input = explode(", ", $input);

    $cpuQuantity = 0;
    $romQuantity = 0;
    $ramQuantity = 0;
    $viaQuantity = 0;

    foreach ($input as $part) {
        if ($part == 'CPU') $cpuQuantity++;
        if ($part == 'ROM') $romQuantity++;
        if ($part == 'RAM') $ramQuantity++;
        if ($part == 'VIA') $viaQuantity++;
    }

    $cpuPrice = 85;
    $romPrice = 45;
    $ramPrice = 35;
    $viaPrice = 45;


    if ($cpuQuantity >=5 ){
        $cpuPrice /= 2;
    }
    if ($romQuantity >=5 ) {
        $romPrice /= 2;
    }
    if ($ramQuantity >= 5) {
        $ramPrice /= 2;
    }
    if ($viaQuantity >= 5) {
        $viaPrice /= 2;
    }


    $totalCost =
        $cpuQuantity * $cpuPrice +
        $romQuantity * $romPrice +
        $ramQuantity * $ramPrice +
        $viaQuantity * $viaPrice;


    $assembledComputers = min([$cpuQuantity, $romQuantity, $ramQuantity, $viaQuantity]);
    $computersProfit = $assembledComputers * 420;


    $cpuQuantity -= $assembledComputers;
    $romQuantity -= $assembledComputers;
    $ramQuantity -= $assembledComputers;
    $viaQuantity -= $assembledComputers;
    $leftoverparts = $cpuQuantity + $romQuantity + $ramQuantity + $viaQuantity;


    $leftoverpartsMoney =
            $cpuQuantity * 85/2 +
            $romQuantity * 45/2 +
            $ramQuantity * 35/2 +
            $viaQuantity * 45/2;

    $profit = $computersProfit + $leftoverpartsMoney;
    $balance = $profit - $totalCost;

    echo "<ul>";
    echo "<li>" . $assembledComputers . " computers assembled" . "</li>";
    echo "<li>" . $leftoverparts . " parts left" . "</li>";
    echo "</ul>";
    if ($balance > 0) {
        echo "<p>Nakov gained $balance leva</p>";
    } elseif ($output <= 0) {
        echo "<p>Nakov lost $balance leva</p>";
    }
}
