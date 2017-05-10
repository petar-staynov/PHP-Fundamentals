<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Problem01</title>
</head>
<body>
<b>Input:</b>
<form action="preciousStones.php" method="get">
    <input name='rocks' size="100" value="zzhcdde,hzccd,eezhg"><br>
    <input type="submit">
</form>
<p><b>Expected Output:</b> 2</p>
<br/>
<b>Input:</b>
<form action="preciousStones.php" method="get">
    <input name='rocks' size="100" value="zcgdef,hzgfcd,eedfhg"><br>
    <input type="submit">
</form>
<p><b>Expected Output:</b> 3</p>
<br/>
</body>
</html>

<?php
if (isset($_GET['rocks'])) {
    $input = $_GET['rocks'];
    $input = explode(",", $input);
    $elements = [];
    for ($word = 0; $word < count($input); $word++) {
        $input[$word] = str_split($input[$word], 1);
    }
    $elements = [];
//    var_dump($input);

    $firstArr = $input[0];
    for ($firstArrLetter = 0; $firstArrLetter < count($firstArr); $firstArrLetter++) {
        $currentLetter = $firstArr[$firstArrLetter];
        $currentLetterNum = 1;
//        echo "Current letter = $currentLetter <br>";
        for ($inputArr = 1; $inputArr < count($input); $inputArr++) {
            $currentInputArr = $input[$inputArr];
            for ($inputArrLetter = 0; $inputArrLetter < count($currentInputArr); $inputArrLetter++) {
//                echo "Current input letter = $currentInputArr[$inputArrLetter]<br>";
                if ($currentInputArr[$inputArrLetter] == $currentLetter) {
                    $currentLetterNum++;
//                    echo "++";
                    break;
                }
            }
//            echo "$currentLetter has occured $currentLetterNum <br>";

            if ($currentLetterNum == count($input)) {
                $elements[] = $currentLetter;
            }
        }
//    echo "====<br>";
    }
    $elements = array_unique($elements);
echo count($elements);
//    var_dump($elements);
}
