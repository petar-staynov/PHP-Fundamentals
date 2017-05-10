<?php /** @var $data \Data\IndexViewData */ ?>

<form method="post" enctype="multipart/form-data">
    Home Team: <input value="" type="text" name="home_team"/> <br/>
    Away Team: <input value="" type="text" name="away_team"/> <br/>
    Match Type: <input value="" type="text" name="match_type"/> <br/>
    Home Goals: <input value="" type="text" name="home_goals"/> <br/>
    Away Goals: <input value="" type="text" name="away_goals"/> <br/>
    Played On: <input value="" type="date" name="played_on"/> <br/>
    Stadium <input value="" type="text" name="stadium"/> <br/>
    Tickets Sold: <input value="" type="text" name="tickets_sold"/> <br/>
    Tickets Price: <input value="" type="text" name="tickets_price"/> <br/>
    <input type="submit" name="add" value="Add Match"/>
</form>
