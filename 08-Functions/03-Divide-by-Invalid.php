<form method="get">
    <input type="text" name="divider"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])) {
    $x = $_GET['divider'];

    $output = divideByX($x);

    var_dump($output);

    function divideByX($x)
    {
        if (!is_numeric($x)) {
            throw new Exception("X is not a number");
        } elseif ($x == 0) {
            throw new  Exception("X is 0");
        }
        else return 1 / $x;
    }

    try {
        echo divideByX(5) . "\n";
        echo divideByX("string") . "\n";
        echo divideByX(0) . "\n";
    } catch (Exception $exc) {
        echo "Caught exception: " . $exc->getMessage(), "\n";
    } finally {
        echo "Finally!";
    }
}

?>

<?php
$x = trim(fgets(STDIN));

$output = divideByX($x);

echo $output;
echo "Finally is always executed";

function divideByX($x)
{
    if (!is_numeric($x)) {
        return "Caught exception: Wrong type \n";
    } elseif ($x == 0) {
        return "Caught exception: Division by zero. \n";
    }
    else return 1 / $x;
}
