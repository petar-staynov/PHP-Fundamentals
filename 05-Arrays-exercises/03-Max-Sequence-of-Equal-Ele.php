<form method="get">
    <input type="text" name="text" value="2 1 1 2 3 3 2 2 2 1"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){
    $nums = explode(" ", $_GET['text']);
//    $arr = array_reverse($arrOrig);

    $maxArr = [];
    $currentArr = [];

    for ($i = 0; $i < count($nums)- 1; $i++){
        $tempArr = [];
        array_push($tempArr, $nums[$i]);

        echo "current num $nums[$i] <br>";

        if ($nums[$i] == $tempArr[0]){
                array_push($tempArr, $nums[$i]);
                echo "push in temp <br>";
        } elseif ($nums[$i] != $tempArr[0]){
            $tempArr = [];
            echo "clear temp <br>";
        }

        if (count($maxArr) < count($tempArr)){
            $maxArr = $tempArr;
        }
    }
    echo implode(" ", $maxArr);
}