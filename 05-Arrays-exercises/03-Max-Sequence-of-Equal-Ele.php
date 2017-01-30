<form method="get">
    <input type="text" name="text" value="2 1 1 2 3 3 2 2 2 1"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){
    $arrOrig = explode(" ", $_GET['text']);
//    $arr = array_reverse($arrOrig);
    $arr = $arrOrig;

    $result = [];

    for ($i = 0; $i < count($arr) - 1; $i++){

    }
}