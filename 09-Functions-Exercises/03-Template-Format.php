<?php
$input = explode(", ", trim(fgets(STDIN)));

$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<quiz>";
for ($i = 0; $i < count($input); $i+=2){
    $xml .= output($input[$i], $input[$i+1]);
}
$xml .= "\n</quiz>";
echo $xml;
function output($question, $answer){
$questionAnswer = "
  <question>
    $question
  </question>
  <answer>
    $answer
  </answer>";

return $questionAnswer;
}