<form method="get">
    <input type="text" name="string"/>
    <input type="submit" name="submit"/>
</form>

<?php
if(isset($_GET['submit'])){
    $text = fgets(STDIN);
//    $text = $_GET['string'];

    $output = dayOfWeek($text);

    echo $output;
}

function dayOfWeek($arg) : string {
    switch ($arg){
        case "1": return "Monday";
        case "2": return "Tuesday";
        case "3": return "Wednesday";
        case "4": return "Thursday";
        case "5": return "Friday";
        case "6": return "Saturday";
        case "7": return "Sunday";
        default: return "Invalid day";
    }
}

?>


<?php
//$text = trim(fgets(STDIN));
//
//$output = dayOfWeek((string)$text);
//echo $output;
//
//function dayOfWeek($text) : string {
//    switch ($text){
//        case "Monday": return "1"; break;
//        case "Tuesday": return "2"; break;
//        case "Wednesday": return "3"; break;
//        case "Thursday": return "4"; break;
//        case "Friday": return "5"; break;
//        case "Saturday": return "6"; break;
//        case "Sunday": return "7"; break;
//        default: return "error"; break;
//    }
//}


