<form method="GET">
    <input type="text" name="input"/>
    <input type="submit" name="submit"/>
</form>
<?php
if(isset($_GET['input'])){
    $input = trim($_GET['input']);

    $chars = str_split($input);
    $html = "";

    for ($i = 0; $i < count($chars); $i++){
        if (ord($chars[$i]) % 2 == 0 && ord($chars[$i]) != 32){
            $html .= "<font color='red'>$chars[$i] </font>";
        } elseif (ord($chars[$i]) % 2 != 0 && ord($chars[$i]) != 32) {
            $html .= "<font color='blue'>$chars[$i] </font>";
        }
    }
    echo $html;
}

