<?php
$input = intval(trim(fgets(STDIN)));


$letter = 0;
$sequenceRow = 0;
$sequence = ['A', 'T', 'C', 'G', 'T', 'T', 'A', 'G', 'G', 'G',];

for ($row = 0; $row < $input; $row++){
    //ROW1
    if ($sequenceRow == 0){
        echo "**";
        echo $sequence[$letter++];
        echo $sequence[$letter++];
        echo "**\n";
        $sequenceRow++;
    }
    //ROW2
    elseif ($sequenceRow == 1){
        echo "*";
        echo $sequence[$letter++];
        echo "--";
        echo $sequence[$letter++];
        echo "*\n";
        $sequenceRow++;
    }
    //ROW3
    elseif ($sequenceRow == 2){
        echo $sequence[$letter++];
        echo "----";
        echo $sequence[$letter++];
        echo "\n";
        $sequenceRow++;
    }
    //ROW4
    elseif ($sequenceRow == 3){
        echo "*";
        echo $sequence[$letter++];
        echo "--";
        echo $sequence[$letter++];
        echo "*\n";
        $sequenceRow = 0;
    }
    if ($letter >= count($sequence)){
        $letter = 0;
    }
}