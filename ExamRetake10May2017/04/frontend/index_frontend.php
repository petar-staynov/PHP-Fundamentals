<?php /** @var $data \Data\MatchViewData[] */ ?>

<table border="1">
    <thead>
    <tr>
        <th>Match ID</th>
        <th>Home Team</th>
        <th>Away Teams</th>
        <th>Type</th>
        <th>Home Goals</th>
        <th>Away Goals</th>
        <th>Date Played</th>
        <th>Stadium</th>
        <th>Tickets Sold</th>
        <th>Tickets Price</th>
        <th>Profit</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $match): ?>
        <tr>
            <td><?=$match->getId(); ?></td>
            <td><?=$match->getHomeTeam(); ?></td>
            <td><?=$match->getAwayTeam(); ?></td>
            <td><?=$match->getMatchType(); ?></td>
            <td><?=$match->getHomeGoals(); ?></td>
            <td><?=$match->getAwayGoals(); ?></td>
            <td><?=$match->getPlayedOn(); ?></td>
            <td><?=$match->getStadium(); ?></td>
            <td><?=$match->getTicketsSold(); ?></td>
            <td><?=$match->getTicketsPrice(); ?></td>
            <td><?=($match->getTicketsSold()*$match->getTicketsPrice()); ?></td>
            <td>
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<h1><a href="add.php">ADD</a></h1>

