<form action="StringModifier.php" method="POST">
    <input type="text" name="string">  <br>
    <input type="radio" name="operation" value="palindrome"> Check Palindrome <br>
    <input type="radio" name="operation" value="reverse"> Reverse String <br>
    <input type="radio" name="operation" value="split"> Split <br>
    <input type="radio" name="operation" value="hash"> Hash string <br>
    <input type="radio" name="operation" value="shuffle"> Shuffle string <br>
    <input type="submit" name="submit"> <br>
</form>
<?php
if(isset($_POST['submit'])){
    $string = $_POST['string'];
    $operation = $_POST['operation'];

    switch ($operation){
        case "palindrome":
            $reverse = strrev($string);
            if ($reverse == $string) echo "$string is a palindrome.";
            else echo "$string is not a palindrome";
            break;

        case "reverse":
            $reverse = strrev($string);
            echo $reverse;
            break;
        case "split":
                $split = str_split($string);
                foreach ($split as $letter){
                    echo "$letter ";
                }
            break;

        case "hash":
                $hash = crypt($string, null);
                echo $hash;
            break;

        case "shuffle":
            $shuffle = str_shuffle($string);
            echo $shuffle;
            break;

    }
}
?>