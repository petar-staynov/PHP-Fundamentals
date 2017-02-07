<form method="get">
    <input type="text" name="text"/>
    <input type="submit" name="submit"/>
</form>

<?php
    if(isset($_GET['text'])){
        $text = $_GET['num1'];

        $output = isPalindrome($text);
        echo "<p>$output</p>";
    }

    function isPalindrome($arg) : bool{
        for ($i = 0; $i<strlen($arg); $i++){
            if ($arg[$i] != $arg[strlen($arg) - 1 - $i]){
                return false;
            }
            else return true;
        }
    }
