<form action="09-Calendar.php" method="post">
    Year: <input type="text" name="year"><br>
    <input type="submit" name="submit">
</form>

<?php if (isset($_POST['submit'])) {
    $year = $_POST['year'];
}
$year = 2012;

/* Set the default timezone */
date_default_timezone_set("Europe/Sofia");

/* Set the date */
$date = date("{$year}-01-01") . "<br>";

echo $date;
for ($m=1; $m<=12; $m++) {
    $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
    echo $month. '<br>';
}

?>

//2complex4me