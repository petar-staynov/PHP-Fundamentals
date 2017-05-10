<?php


namespace Services;


use Adapter\DatabaseInterface;
use Data\MatchViewData;
use Data\Genre;
use Data\IndexViewData;

class MatchService implements MatchServiceInterface
{

    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * MatchService constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function addMatch($homeTeam, $awayTeam, $matchType, $homeGoals, $awayGoals, $playedOn, $stadium, $ticketsSold, $ticketsPrice)
    {

        foreach (func_get_args() as $argName => $value) {
            if (empty($value) && $argName < 6) {
                throw new \Exception("Cannot be empty");
            }
        }

        new \DateTime($playedOn);

        $query = "
            INSERT INTO matches
            SET
               home_team = ?,
               away_team = ?,
               match_type = ?,
               home_goals = ?,
               away_goals = ?,
               played_on = ?,
               stadium = ?,
               tickets_sold = ?,
               tickets_price = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$homeTeam, $awayTeam, $matchType, $homeGoals, $awayGoals, $playedOn, $stadium, $ticketsSold, $ticketsPrice]);
    }

    /**
     * @return IndexViewData
     */
    public function getIndexViewData()
    {
        $viewData = null;
        return $viewData;
    }

    public function editMatch($id, $homeTeam, $awayTeam, $matchType, $homeGoals, $awayGoals, $playedOn, $stadium, $ticketsSold, $ticketsPrice)
    {
        // TODO: Implement editBook() method.
    }

    public function deleteId($id)
    {
        // TODO: Implement deleteId() method.
    }


    /**
     * @return MatchViewData[]|\Generator
     */
    public function findAll()
    {
        $query = "
            SELECT
              id,
              home_team,
              away_team,
              match_type,
              home_goals,
              away_goals,
              played_on,
              stadium,
              tickets_sold, 
              tickets_price
            FROM
               matches 
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        while ($match = $stmt->fetchObject(MatchViewData::class)) {
            yield $match;
        }
    }
}