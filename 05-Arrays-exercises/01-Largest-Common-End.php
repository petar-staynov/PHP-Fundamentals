<form method="get">
    <input type="text" name="text" value="hi php java csharp sql html css js"/>
    <input type="text" name="text2" value="hi php java js softuni nakov java learn"/>
    <input type="submit" name="submit"/>
</form>
<form method="get">
    <input type="text" name="text" value="hi php java xml csharp sql html css js"/>
    <input type="text" name="text2" value="nakov java sql html css js"/>
    <input type="submit" name="submit"/>
</form>
<form method="get">
    <input type="text" name="text" value="I love programming"/>
    <input type="text" name="text2" value="Learn Java or C#"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){

    $arr1 = explode(" ", $_GET['text']);
    $arr2 = explode(" ", $_GET['text2']);

    $longerArr = [];
    $shorterArr = [];
    if (count($arr1) > count($arr2)){
        $longerArr = $arr1;
        $shorterArr = $arr2;
    }
    else{
        $longerArr = $arr2;
        $shorterArr = $arr1;
    }
    $lenghtDifference = count($longerArr) - count($shorterArr);

    //Left to right
    $result = 0;
    for ($i = 0; $i < min(count($arr1), count($arr2)); $i++) {
        if ($arr1[$i] == $arr2[$i]) {$result++;}
    }

    //Right to left
    $result2 = 0;
    for ($i2 = count($longerArr) - 1; $i2 > $lenghtDifference; $i2--) {
        if ($longerArr[$i2] == $shorterArr[$i2 - $lenghtDifference]) {
                    $result2++;
        }
    }
    if ($result2 > $result) {
        $output = $result2;
    }
    elseif($result2<$result) {
        $output = $result;
    }
    else $output = 0;

    echo $output;
}