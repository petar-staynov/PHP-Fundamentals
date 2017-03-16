<?php
class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function getName(): string
    {
        return $this->name;
    }
}

$n = trim(fgets(STDIN));
$persons = [];
for ($i = 0; $i < $n; $i++){
    $input = explode(" ", trim(fgets(STDIN)));
    $name = $input[0];
    $age = intval($input[1]);

    if ($age > 30){
        $person = new Person($name, $age);
        $persons[] = $person;
    }
}
usort($persons, function($a, $b)
{
    return strcmp($a->getName(), $b->getName());
});
foreach ($persons as $person){
    echo $person->getName() . " - " . $person->getAge() . PHP_EOL;
}