<?php


namespace Services;


use Data\MatchViewData;
use Data\Genre;
use Data\IndexViewData;

interface MatchServiceInterface
{
    public function addMatch($homeTeam, $awayTeam, $matchType, $homeGoals, $awayGoals, $playedOn, $stadium, $ticketsSold, $ticketsPrice);

    /**
     * @return IndexViewData
     */
    public function getIndexViewData();

    public function editMatch($id, $homeTeam, $awayTeam, $matchType, $homeGoals, $awayGoals, $playedOn, $stadium, $ticketsSold, $ticketsPrice);

    public function deleteId($id);

    /**
     * @return MatchViewData[]|\Generator
     */
    public function findAll();
}