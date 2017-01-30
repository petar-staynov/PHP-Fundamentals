<p>Separate rows with "," and elements with " "</p>
<p>Example: 1 7 3 4,9 8 10 6</p>
<form method="get">
    <input type="text" name="text"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['text'])){
    $matrix = explode(",",$_GET['text']);

    for ($row = 0; $row < count($matrix); $row++){
        $matrix[$row] = explode(" ", $matrix[$row]);
    }

    $biggest = intval($matrix[0][0]);
    $smallest = intval($matrix[0][0]);

    for ($row2 = 0; $row2 < count($matrix); $row2++){
        for ($col2 = 0; $col2 < count($matrix[$row2]); $col2++){
            if($biggest < $matrix[$row2][$col2]) $biggest = $matrix[$row2][$col2];
            if($smallest > $matrix[$row2][$col2]) $smallest = $matrix[$row2][$col2];
            echo $matrix[$row2][$col2] . " ";
        }
        echo "<br>";
    }
    echo "Biggest number is " . $biggest . "<br>";
    echo "Smallest number is " . $smallest;

}
