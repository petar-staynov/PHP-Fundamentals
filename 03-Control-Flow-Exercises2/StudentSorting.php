<?php
    session_start();

    if(isset($_SESSION['numberOfEntries'])){
        $numberOfEntries = $_SESSION['numberOfEntries'];
    }
    else $numberOfEntries = 1;
    $_SESSION['numberOfEntries'] = $numberOfEntries;


    $html= "
            <form method='post' action='StudentSorting.php'>
            <table>
            <th>Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Score</th>";

        for ($entry = 0; $entry < $numberOfEntries; $entry++){
        $html.="<tr>
                <td><input type='text' name='Name' /></td>
                <td><input type='text' name='SecondName' /></td>
                <td><input type='text' name='Email' /></td>
                <td><input type='text' name='Score' /></td>
                <td><input type='submit' name='Add' value='+'/></td>
            </tr>";
        }

            $html.="</table>
            </form>";

if(isset($_POST['Add'])){
    $numberOfEntries++;
    $_SESSION['numberOfEntries'] = $numberOfEntries;

    $html= "
            <form method='post' action='StudentSorting.php'>
            <table>
            <th>Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Score</th>";

    for ($entry = 0; $entry < $numberOfEntries; $entry++){
        $html.="<tr>
                <td><input type='text' name='Name' /></td>
                <td><input type='text' name='SecondName' /></td>
                <td><input type='text' name='Email' /></td>
                <td><input type='text' name='Score' /></td>
                <td><input type='submit' name='Add' value='+'/></td>
            </tr>";
    }

    $html.="</table>
            </form>";
}

if(isset($_GET['Clear'])){
    session_destroy();
}
$html.= "<form method='get'><input type='submit' name='Clear' value='CLEAR'/></form>";

echo $html;
