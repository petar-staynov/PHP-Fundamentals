<form method="get">
    <input type="text" name="text" value="3 2 4 -1"/>
    <input type="text" name="rotations" value="2"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){
    $arr = explode(" ", $_GET['text']);
    $result = [];

    $rotations = $_GET['rotations'];

    for($i = 0; $i < $rotations; $i++){
        array_unshift($arr, $arr[count($arr)-1]);
        array_pop($arr);

        if ($i > 0){
            $tempArr = $arr;
            
        }
    }
    foreach ($arr as $item){
        echo $item . " ";
    }
}