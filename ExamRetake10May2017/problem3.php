<?php
$input = trim(fgets(STDIN));

//$input = "25|0:0|MLSM MLFL LPPF LPSS"; //custom at 0:0 - works
//$input = "25|0:3|MLSM MLFL LPPF LPSS"; //custom at 0:3 - works

//$input = "25|1:1|MLSM MLFL LPPF LPSS"; //judge2 //death at 3:0
//$input = "50|2:2|PMSL PLSF SFLS PLMM"; //judge 1
//$input = "50|2:2|PMSL PLSF SFLS PLMM"; //example 1

if($input == null) exit;
$input = explode('|', $input);

$drunkPerc = $input[0];

$startRowCol = $input[1];
$startRowCol = explode(':', $startRowCol);
$startRow = $startRowCol[0];
$startCol = $startRowCol[1];

$matrixFiller = $input[2];
$matrixFillerElements = str_replace(' ', '', $matrixFiller);

//var_dump($matrixFiller);

//Matrix tricks filler
$matrix = [[]];
$element = 0;
for ($row = 0; $row < 4; $row++) {
    for ($col = 0; $col < 4; $col++) {
        $matrix[$row][$col] = $matrixFillerElements[$element];
        $element++;
    }
}

//Matrix walker
$ended = false;
//$startPosition = $matrix[$startRow][$startCol];

$currentRow = $startRow;
$currentCol = $startCol;
$lastDirection = 'LEFT';
$lastTrick = null;
$boredPerc = 20;

$initialSpawn = true;

while ($ended == false) {

    $tempTrick = $matrix[$currentRow][$currentCol];
    ////echo "Current position is $tempTrick. Row = $currentRow, Col = $currentCol<br>";


    //Gets current magic trick
    if ($matrix[$currentRow][$currentCol] == 'P') {
        $magicTrick = 5;
        if ($magicTrick == $lastTrick) {
            $magicTrick *= 2;
            ////echo ' DOUBLED';
        }

        $boredPerc += $magicTrick + (($drunkPerc / 100) * $magicTrick);

        //echo "Magic trick = $magicTrick, Bored = $boredPerc, Last trick = $lastTrick";
        $lastTrick = $magicTrick;

    } elseif ($matrix[$currentRow][$currentCol] == 'M') {
        $magicTrick = 10;
        if ($magicTrick == $lastTrick) {
            $magicTrick *= 2;
            //echo ' DOUBLED';
        }
        $boredPerc += $magicTrick + (($drunkPerc / 100) * $magicTrick);
        //echo "Magic trick = $magicTrick, Bored = $boredPerc, Last trick = $lastTrick";
        $lastTrick = $magicTrick;
    } elseif ($matrix[$currentRow][$currentCol] == 'L') {
        $magicTrick = 7;
        if ($magicTrick == $lastTrick) {
            $magicTrick *= 2;
            //echo ' DOUBLED';
        }
        $boredPerc += $magicTrick + (($drunkPerc / 100) * $magicTrick);
        //echo "Magic trick = $magicTrick, Bored = $boredPerc, Last trick = $lastTrick";
        $lastTrick = $magicTrick;

    } elseif ($matrix[$currentRow][$currentCol] == 'S') {
        $magicTrick = -5;

        if ($magicTrick == $lastTrick) {
            $magicTrick *= 2;
            //echo ' DOUBLED';
        }
        $boredPerc += $magicTrick + (($drunkPerc / 100) * $magicTrick);


        //echo "Magic trick = $magicTrick, Bored = $boredPerc, Last trick = $lastTrick";
        $lastTrick = $magicTrick;

    } elseif ($matrix[$currentRow][$currentCol] == 'F') {
        $magicTrick = -15;

        $boredPerc += $magicTrick + (($drunkPerc / 100) * $magicTrick);
        //echo "Magic trick = $magicTrick, Bored = $boredPerc, Last trick = $lastTrick";
        $lastTrick = $magicTrick;
    }


    //CHECKS IF ENDGAME
    if ($boredPerc >= 100) {
        echo "<p>RoYaL went mad and killed Angel at $currentRow:$currentCol</p>";
        $ended = true;
    } else if ($boredPerc <= 0 ||
        $currentRow == 0 && $currentCol == 0 && $lastDirection != 'LEFT' ||
        $currentRow == 3 && $currentCol == 0 && $lastDirection != 'LEFT'
    ) {
        echo "<p>Angel succeeded RoYaL is asleep</p>";
        $ended = true;
    }


    //Checks if spawned on topmost row


    //CHECKS POSIBLE DIRECTIONS
    if ($initialSpawn == true && $currentRow == 0 && isset($matrix[$currentRow][$currentCol - 1])) { //checks if spawned on top row (edge case)
        var_dump('ASD');
        $lastDirection = 'LEFT';
        $currentCol--;
    } elseif (isset($matrix[$currentRow - 1][$currentCol]) && $lastDirection != 'DOWN') {
        $lastDirection = 'UP';
        $currentRow--;
    } elseif ($lastDirection != 'UP' && isset($matrix[$currentRow + 1][$currentCol])) {
        $lastDirection = 'DOWN';
        $currentRow++;
    } else {
        $lastDirection = 'LEFT';
        $currentCol--;
    }
    //echo "<hr>";
    $initialSpawn = false;

}
//$matrix = [[]];
//var_dump($matrix)