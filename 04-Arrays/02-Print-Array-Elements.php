<form method="get">
    <input type="text" name="text"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){
    $string = $_GET['text'];
    $stringArr = explode(',', $string);

    for ($i = 0; $i < count($stringArr) / 2; $i++){
        echo $stringArr[$i] . " " . $stringArr[count($stringArr) - 1 - $i] . "<br>";
    }
}
