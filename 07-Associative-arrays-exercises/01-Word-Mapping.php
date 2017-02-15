<form method="GET">
    <input type="text" name="input"/>
    <input type="submit" name="submit"/>
</form>
<?php
    if(isset($_GET['input'])){
        $input = explode(" ",$_GET['input']);
        $words = [];

        $html = "";
        $html .= "<table border='2'>";

        for ($i = 0; $i < count($input); $i++){
            $word = strtolower($input[$i]);
            $word = preg_replace('/[^A-Za-z0-9\-]/', '', $word);

            if (!isset($words[$word])){
                $words[$word] = 1;
            } else {
                $words[$word] += 1;
            }
        }

        foreach ($words as $word => $value){
            $html .= "<tr><td>$word</td><td>$value</td></tr>";
        }
        $html .= "</table>";
        echo $html;
    }

