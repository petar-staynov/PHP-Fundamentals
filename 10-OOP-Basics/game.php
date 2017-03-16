<?php
class Player
{
    private static $lastId;

    private $id;
    private $name;
    private $health;
    private $attack;

    public function __construct(string $name, int $health, int $attack)
    {
        $this->name = $name;
        $this->health = $health;
        $this->attack = $attack;
        $this->id = ++self::$lastId;
    }
    public function getId() : int {
        return $this->id;
    }
    public function getAttack() : int{
        return $this->attack;
    }

    public function reduceHealth(int $hit){
        $this->health -= $hit;
    }
    public function isAlive() : bool{
        if ($this->health > 0){
            return true;
        }
        return false;
    }
    public function attack(Player $player){
        if ($player->getId() == $this->getId()){
            throw new Exception("Cannot attack yourself");
        } else{
            $player->reduceHealth($this->getAttack());
        }
    }
}
$player1 = new Player("Pesho", "100", "15");
$player2 = new Player("Mario", "80", "10");

$player1->attack($player2);
var_dump($player2);