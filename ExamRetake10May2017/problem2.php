<?php
$input = trim(fgets(STDIN));

//$input = "Rakia Bira Ceca|ceca rakia rakia rakia rakia salata meso suh-salam file belo kafevo tok tok tok";
//$input = "lepa-brena vino rakia filence salatka|lepa-brena mile hamburgski purjola vino vino vino filence supa plikche topeno-sirene rakia rakia rakia rakia rakia rakia";
$input = explode('|', $input);

$requests = explode(' ', $input[0]);
$boughts = explode(' ', $input[1]);

$requestsArr = [];
foreach ($requests as $request) {
    $requestsArr[$request] = 0;
}

//Counts requests matches
foreach ($requests as $request) {
    foreach ($boughts as $bought) {
        if (strtolower($request) == strtolower($bought)) {
            $requestsArr[$request]++;
            unset($boughts[$bought]);
        }
    }
}

//Counts invalid bringings
$invaluableItems = [];
$search_array = array_map('strtolower', $requests);
foreach ($boughts as $bought) {
    if (!in_array(strtolower($bought), $search_array)) {
        $invaluableItems[] = $bought;
    }
}
//var_dump($invaluableItems);
//var_dump($requestsArr);

$angryPercent = (count($invaluableItems) / count(($boughts)) * 100);
$angryPercent = round($angryPercent);

echo "<ul>";
foreach ($requestsArr as $requestedItem => $value) {
    echo "<li>$requestedItem:$value</li>";
}
echo "<li>Angry:$angryPercent%</li>";
echo "</ul>";
?>

<hr>
<ul>
    <li>Rakia:4</li>
    <li>Bira:0</li>
    <li>Ceca:1</li>
    <li>Angry:64%</li>
</ul>

<ul>
    <li>lepa-brena:1</li>
    <li>vino:3</li>
    <li>rakia:6</li>
    <li>filence:1</li>
    <li>salatka:0</li>
    <li>Angry:35%</li>
</ul>
