<form method="get">
    <input type="text" name="text" value="1 2 3 4 5"/>
    <input type="text" name="rotations" value="3"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){
    $arr = explode(" ", $_GET['text']);
    $rotated = $arr;
    $sum = [];

    $rotations = $_GET['rotations'];

    for($i = 0; $i < $rotations; $i++){
        array_unshift($rotated, $rotated[count($rotated)-1]);
        array_pop($rotated);

        for ($j = 0; $j < count($rotated); $j++){
            $sum[$j]  = $sum[$j] + $rotated[$j];
        }
    }
    foreach($sum as $item){
        echo $item . " ";
    }
}