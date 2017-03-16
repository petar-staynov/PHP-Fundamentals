<form method="get">
    <textarea name="array"></textarea>
    <input type="submit" name="submit">
</form>
<?php
if (isset($_GET['array'])) {
    $input = htmlspecialchars($_GET['string']);
    $input = explode("\n", str_replace("\r", "", $input)); //split by rows
    array_pop($input); //remove END
    for ($row = 0; $row < count($input); $row++){
        $input[$row] = str_split($input[$row]);
    } //string to array
    var_dump($input, 1);

    for ($i = 0; $i < count($input); $i++){
        $inputRow = $input[$i];
        for($k = 0; $k < count($inputRow); $k++){

        }
    }
}