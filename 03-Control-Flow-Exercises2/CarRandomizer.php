<form action="CarRandomizer.php" method="post">
    Enter cars <input type="text" name="cars"><br>
    <input type="submit" name="submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $carsString = $_POST['cars'];
    $cars = explode(", ", $carsString);

    $colors = array("Black", "White", "Blue", "Green", "Yellow", "Orange", "Red", "Silver");
    $html = "<table>";
    $html .= "<th>Car</th><th>Color</th><th>Count</th>";

    foreach ($cars as $car){
        $randColor = $colors[rand(0, sizeof($colors)-1)];
        $randNumber = rand(1,5);

        $html .= "<tr><td>$car</td><td>$randColor</td><td>$randNumber</td></tr>";
    }
    echo $html;
}
?>


<style>
    table, th, td {
        border: 1px solid black;
        text-align: left;
    }
</style>