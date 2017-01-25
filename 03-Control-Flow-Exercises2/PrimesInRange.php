<form action="PrimesInRange.php" method="post">
    Start Index <input type="number" name="start"><br>
    End index <input type="number" name="end"><br>
    <input type="submit" name="submit">
</form>

<?php
    if(isset($_POST['submit'])){
    $start = $_POST['start'];
    $end = $_POST['end'];

    for ($number = $start; $number <= $end; $number++){
        $isPrime = true;

        for ($i = 2; $i < $number; $i++){
            if ($number % $i == 0) {
                $isPrime = false;
            }
        }
        if ($number == 1) $isPrime = false;

        if ($isPrime == true) echo "<b>$number</b>" . " ";
        else echo "$number" . " ";
    }
}
?>