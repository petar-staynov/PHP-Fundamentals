<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Problem02</title>
</head>
<body>
<b>Input:</b>
<form action="simpleCipher.php" method="get">
    <input name='string' size="100" value="zibxle-SutFA"><br>
    <input name='key' size="20" value="3"><br>
    <input type="submit">
</form>
<p><b>Expected Output:</b> cleaoh-VxwID</p>
<br/>
<b>Input:</b>
<form action="simpleCipher.php" method="get">
    <input name='string' size="100" value="HNbltpuk"><br>
    <input name='key' size="20" value="4"><br>
    <input type="submit">
</form>
<p><b>Expected Output:</b> LRfpxtyo</p>
<br/>
<b>Input:</b>
<form action="simpleCipher.php" method="get">
    <input name='string' size="100" value="TilxlM-pFt"><br>
    <input name='key' size="20" value="6"><br>
    <input type="submit">
</form>
<p><b>Expected Output:</b> ZordrS-vLz</p>
<br/>
</body>
</html>

<?php
if (isset($_GET['string']) && isset($_GET['key'])) {
    $string = $_GET['string'];
    $key = $_GET['key'];

    $arr = str_split($string, 1);
//    var_dump($arr);

    for ($letter = 0; $letter < count($arr); $letter++) {
        $ord = ord($arr[$letter]);
        if ($ord >= 65 && $ord <= 90) {
            //echo "current letter $ord= $arr[$letter]<br>";
            for ($loop = 0; $loop < $key; $loop++){
                $ord++;
                if ($ord > 90){
                    $ord = 65;
                }
            }
            //echo "new ord = $ord<br>";
            $char = chr($ord);
            $arr[$letter] = $char;
            //echo "new letter = $arr[$letter] $ord<br>";
        }

        elseif ($ord >= 97 && $ord <= 122) {
            //echo "current letter $ord= $arr[$letter]<br>";
            for ($loop = 0; $loop < $key; $loop++){
                $ord++;
                if ($ord > 122){
                    $ord = 97;
                }
            }
            //echo "new ord = $ord<br>";
            $char = chr($ord);
            $arr[$letter] = $char;
            //echo "new letter = $arr[$letter] $ord<br>";
        }


    }
    $result = implode("", $arr);
    echo $result;

}