<?php


namespace Data;


class MatchViewData
{

    private $id;

    private $home_team;

    private $away_team;

    private $match_type;

    private $home_goals;

    private $away_goals;

    private $played_on;

    private $stadium;

    private $tickets_sold;

    private $tickets_price;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getHomeTeam()
    {
        return $this->home_team;
    }

    /**
     * @param mixed $home_team
     */
    public function setHomeTeam($home_team)
    {
        $this->home_team = $home_team;
    }

    /**
     * @return mixed
     */
    public function getAwayTeam()
    {
        return $this->away_team;
    }

    /**
     * @param mixed $away_team
     */
    public function setAwayTeam($away_team)
    {
        $this->away_team = $away_team;
    }

    /**
     * @return mixed
     */
    public function getMatchType()
    {
        return $this->match_type;
    }

    /**
     * @param mixed $match_type
     */
    public function setMatchType($match_type)
    {
        $this->match_type = $match_type;
    }

    /**
     * @return mixed
     */
    public function getHomeGoals()
    {
        return $this->home_goals;
    }

    /**
     * @param mixed $home_goals
     */
    public function setHomeGoals($home_goals)
    {
        $this->home_goals = $home_goals;
    }

    /**
     * @return mixed
     */
    public function getAwayGoals()
    {
        return $this->away_goals;
    }

    /**
     * @param mixed $away_goals
     */
    public function setAwayGoals($away_goals)
    {
        $this->away_goals = $away_goals;
    }

    /**
     * @return mixed
     */
    public function getPlayedOn()
    {
        return $this->played_on;
    }

    /**
     * @param mixed $played_on
     */
    public function setPlayedOn($played_on)
    {
        $this->played_on = $played_on;
    }

    /**
     * @return mixed
     */
    public function getStadium()
    {
        return $this->stadium;
    }

    /**
     * @param mixed $stadium
     */
    public function setStadium($stadium)
    {
        $this->stadium = $stadium;
    }

    /**
     * @return mixed
     */
    public function getTicketsSold()
    {
        return $this->tickets_sold;
    }

    /**
     * @param mixed $tickets_sold
     */
    public function setTicketsSold($tickets_sold)
    {
        $this->tickets_sold = $tickets_sold;
    }

    /**
     * @return mixed
     */
    public function getTicketsPrice()
    {
        return $this->tickets_price;
    }

    /**
     * @param mixed $tickets_price
     */
    public function setTicketsPrice($tickets_price)
    {
        $this->tickets_price = $tickets_price;
    }





}