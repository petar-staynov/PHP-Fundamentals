<form method="GET">
    Categories: <input type="text" name="categories"/>
    Tags: <input type="text" name="tags"/>
    Months: <input type="text" name="months"/>

    <input type="submit" name="submit"/>
</form>
<?php
if(isset($_GET['categories'])
&& isset($_GET['tags'])
&& isset($_GET['months'])){
    $categories = explode(", ", trim($_GET['categories']));
    $tags = explode(", ", trim($_GET['tags']));
    $months = explode(", ", trim($_GET['months']));

    $html = "";

    $html .= "<h2>Categories</h2>";
    $html .= "<ul>";
    for ($cat = 0; $cat < count($categories); $cat++){
        $html .= "<li>$categories[$cat]</li>";
    }
    $html .= "</ul>";

    $html .= "<h2>Tags</h2>";
    $html .= "<ul>";
    for ($tag = 0; $tag < count($tags); $tag++){
        $html .= "<li>$tags[$tag]</li>";
    }
    $html .= "</ul>";

    $html .= "<h2>Months</h2>";
    $html .= "<ul>";
    for ($m = 0; $m < count($months); $m++){
        $html .= "<li>$months[$m]</li>";
    }
    $html .= "</ul>";

    echo $html;
}

