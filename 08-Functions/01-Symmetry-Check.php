<form method="get">
    <input type="text" name="string"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){
    $text = $_GET['string'];

    $output = isPalindrome($text);

    var_dump($output);
}

function isPalindrome($arg) : bool {
    for ($i = 0; $i<strlen($arg); $i++){
        if ($arg[$i] != $arg[strlen($arg) - 1 - $i]){
            return false;
        }
        else return true;
    }
}
?>

<?php
//    $text = trim(fgets(STDIN));
//
//    $output = isPalindrome($text);
//
//    echo $output ? "true" : "false";
//
//function isPalindrome($arg){
//    for ($i = 0; $i<strlen($arg); $i++){
//        if ($arg[$i] != $arg[strlen($arg) - 1 - $i]){
//            return false;
//        }
//        else return true;
//    }
//}
