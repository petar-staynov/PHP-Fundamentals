<?php
class Car
{
    private $model;
    private $fuelAmount;
    private $fuelCost; //per 1 km
    private $distanceTraveled;

    public function __construct($model, $fuelAmount, $fuelCost)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCost = $fuelCost;
        $this->distanceTraveled = 0;
    }

    public function drive($commandDistance){
        $totalCost = $commandDistance * $this->fuelCost;
        if ($totalCost > $this->fuelAmount){
            echo "Insufficient fuel for the drive\n";
            return;
        } else {
            $this->fuelAmount -= $commandDistance * $this->fuelCost;
            $this->distanceTraveled+=$commandDistance;
        }
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getFuelAmount()
    {
        return number_format($this->fuelAmount, 2);
    }
    public function getDistanceTraveled(){
        return $this->distanceTraveled;
    }
    public function getInfo(){
        $return = $this->getModel() . " " . $this->getFuelAmount() . " " . $this->getDistanceTraveled();
        return $return;
    }
}

$n = trim(fgets(STDIN));

$cars = [];
while ($n > 0){
    $carInfo = explode(" ",trim(fgets(STDIN)));
    $model = $carInfo[0];
    $fuelAmount = $carInfo[1];
    $fuelCost = $carInfo[2];

    $car = new Car($model, $fuelAmount, $fuelCost);
    $cars[] = $car;

    $n--;
}
$command = [];
while ($command[0] != "End"){
    $command = explode(" ", trim(fgets(STDIN)));
    if ($command[0] != "End") {
        $commandAction = $command[0];
        $commandCar = $command[1];
        $commandDistance = $command[2];

        foreach ($cars as $car) {
            $carModel = $car->getModel();
            if ($commandCar == $car->getModel()) {
                $car->drive($commandDistance);
                $totalDriven = $car->getDistanceTraveled();
//                echo "$carModel drove by $commandDistance. Total driven = $totalDriven\n";
            }
        }
    }
    else break;
}
//var_dump($cars);
foreach ($cars as $car){
    echo $car->getInfo() . PHP_EOL;
}