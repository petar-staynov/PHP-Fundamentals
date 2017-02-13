<?php
    class Car
    {
        public $model;
        public $fuelAmount;
        public $fuelCost;
        public $distanceTraveled;

        public function __construct(string $model, float $fuelAmount, float $fuelCost)
        {
            $this->model = $model;
            $this->fuelAmount = $fuelAmount;
            $this->fuelCost = $fuelCost;
            $this->distanceTraveled = 0;
        }

        public function drive(float $distance)
        {
            $cost = $distance * $this->fuelCost;
            $cost = round($cost, 2);

            if ($cost > $this->fuelAmount) {
                throw new Exception("Insufficient fuel for the drive");
            }
            $this->fuelAmount -= $cost;
            $this->distanceTraveled += $distance;
        }

        function __toString($input)
        {
            return $this->model
                . " "
                . round($this->fuelAmount, 2)
                . " "
                . round($this->distanceTraveled, 2);
        }
    }

    $cars = [];
    $n = intval(fgets(STDIN));

    while ($n--){
        $carInfo = explode(" ", trim(fgets(STDIN)));
        $carModel = $carInfo[0];
        $carStartFuel = floatval($carInfo[1]);
        $carFuelCost = floatval($carInfo[2]);

        $car = new Car($carModel, $carStartFuel, $carFuelCost);
        $cars[$carModel] = $car;
    }

    $command = "true";

    while ($command != "END"){
        $tokens = explode(" ", trim(fgets(STDIN)));
        $model = $tokens[1];
        $km = $tokens[2];



        $car = $cars[$model];
        try {
            $car->drive($km);
        } catch (Exception $e){
            echo $e->getMessage() . PHP_EOL;
        }
        $command = trim(fgets(STDIN));
    }

    foreach ($cars as $car){
        echo $cars . PHP_EOL;
    }