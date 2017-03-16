<?php
class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct($model, $engine, $weight, $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    public function getModel()
    {
        return $this->model;
    }
    public function getEngine()
    {
        return $this->engine;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function getColor()
    {
        return $this->color;
    }
}
class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct($model, $power, $displacement, $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getPower()
    {
        return $this->power;
    }
    public function getDisplacement()
    {
        return $this->displacement;
    }
    public function getEfficiency()
    {
        return $this->efficiency;
    }
}

//ENGINES
$n = trim(fgets(STDIN));
$engines = [];
while ($n > 0){
    $engineInfo = explode(" ", trim(fgets(STDIN)));
    $engineModel = $engineInfo[0];
    $enginePower = $engineInfo[1];

    $engineDisplacement = "n/a";
    if (array_key_exists(2, $engineInfo) && is_numeric($engineInfo[2]))
    {
        $engineDisplacement = $engineInfo[2];
    }
    $engineEfficiency = "n/a";
    if (array_key_exists(2, $engineInfo) && !is_numeric($engineInfo[2]))
    {
        $engineEfficiency = $engineInfo[2];
    } elseif (array_key_exists(3, $engineInfo)){
        $engineEfficiency = $engineInfo[3];
    }

    $engine = new Engine($engineModel, $enginePower, $engineDisplacement, $engineEfficiency);
    $engines[] = $engine;
    $n--;
}

$m = trim(fgets(STDIN));
$cars = [];
while ($m > 0){
    $carInfo = explode(" ", trim(fgets(STDIN)));
    $carModel = $carInfo[0];
    $carEngine = $carInfo[1];

    $carWeight = "n/a";
    if (array_key_exists(2, $carInfo) && is_numeric($carInfo[2])){
        $carWeight = $carInfo[2];
    }

    $carColor = "n/a";
    if (array_key_exists(2, $carInfo) && !is_numeric($carInfo[2])) {
        $carColor = $carInfo[2];
    } elseif (array_key_exists(3, $carInfo)){
        $carColor = $carInfo[3];
    }

    $car = new Car($carModel, $carEngine, $carWeight, $carColor);
    $cars[] = $car;
    $m--;
}

foreach ($cars as $car){
    foreach ($engines as $engine){
        if ($car->getEngine() == $engine->getModel()){
            $car->setEngine($engine);
        }
    }
    echo $car->getModel() . ":" . PHP_EOL;
    echo "  " . $car->getEngine()->getModel() . ":" . PHP_EOL;
    echo "    " . "Power: " . $car->getEngine()->getPower() . PHP_EOL;
    echo "    " . "Displacement: ". $car->getEngine()->getDisplacement() . PHP_EOL;
    echo "    " . "Efficiency: " . $car->getEngine()->getEfficiency() . PHP_EOL;
    echo "  " . "Weight: " . $car->getWeight() . PHP_EOL;
    echo "  " . "Color: " . $car->getColor() . PHP_EOL;
}