<?php
//n0fr4meworks
$input = fgets(STDIN);

//$input = 'schaft|Unter dem Begriff Zaturwissenschaft. Naturwissenschaft asdsadschaft werden Wissenschaften zusammengefasst die empirisch arbeiten und sich mit der Erforschung der Natur befassen';
//$input = 'berry|raspberry blueberry acidberryД.';
//$input = 'gesetz|Das Rindfleischetikettierungsuberwachungsaufgabenubertragungsgesetz war im Jahre 1999 im deutschen Bundesland Mecklenburg-Vorpommern Teil eines Gesetzesvorhabens';
$input = explode('|', $input);

$suffix = $input[0];
//$suffix = regexCleaner($suffix);
$string = $input[1];

//string to words
$stringArr = explode(' ', $string);

//checks if word is valid (contains only english letters)
$cleanedWords = [];
foreach ($stringArr as $word) {
//    echo "$word<br>";
//    $word = regexCleaner($word);
    if (clean($word)) {
        $cleanedWords[] = $word;
    }
//    echo "$word<br>";
}
$stringArr = $cleanedWords;

//makes array of longer words
$longerWords = [];
foreach ($stringArr as $word) {
    if (strlen($word) >= 10) {
        $longerWords[] = $word;
    }
}
$stringArr = $longerWords;


//checks if ends in suffix
$matchedWords = [];
foreach ($stringArr as $word) {
    if (matching_ends($word, $suffix) == true) {
        $matchedWords[] = $word;
    }

}
$stringArr = $matchedWords;

//natcasesort($stringArr); //case insensitive sorting
sort($stringArr);


echo "<ul>";
foreach ($stringArr as $word) {
    echo "<li>$word</li>";
}
echo "</ul>";


//var_dump($matchedWords);


function matching_ends($s1, $s2)
{
    return substr($s1, -strlen($s2)) == $s2 ? true : false;
}

function clean($string)
{
    return ctype_alpha($string);
}
function regexCleaner($string){
    return preg_replace('/[^\p{L}{N}\s]/', '', $string); // Removes symbols only.

    return preg_replace('/[^A-Za-z\-]/', '', $string); // Leaves only english chars and numbers;
}