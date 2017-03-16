<?php
class Employee {
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct(string $name,
                                $salary,
                                $position,
                                $department,
                                $email = "n/a",
                                $age = null)
    {
        $this->name = $name;
        $this->salary = number_format($salary, 2);
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return null
     */
    public function getAge()
    {
        return $this->age;
    }

    public function getInfo(){
        $info = "$this->name $this->salary $this->email $this->age";
        return $info;
    }



}

$n = trim(fgets(STDIN));
$employees = [];
while ($n > 0){
    $input = explode(" ", trim(fgets(STDIN)));
    $name = $input[0];
    $salary = $input[1];
    $position = $input[2];
    $department = $input[3];
    $email = "n/a";
    $age = -1;
    if(array_key_exists(4, $input)){
        if (is_numeric($input[4])){
            $age = $input[4];
        } else {
            $email = $input[4];
        }
    }
    if (array_key_exists(5, $input)){
        $age = intval($input[5]);
    }

    $employee = new Employee($name, $salary, $position, $department, $email, $age);
    $employees[] = $employee;
    $n--;
}

$departmentsSalary = [];

foreach ($employees as $employee) {
    $employeeDepartment = $employee->getDepartment();
    if(array_key_exists($employeeDepartment, $departmentsSalary)){
        $departmentsSalary[$employeeDepartment] += $employee->getSalary();
    } else {
        $departmentsSalary[$employeeDepartment] = $employee->getSalary();
    }
}

$highestSalary = array_search(max($departmentsSalary), $departmentsSalary);
echo "Highest Average Salary: $highestSalary\n";

function cmp($a, $b)
{
    return strcmp($b->getSalary(), $a->getSalary());
}
usort($employees, "cmp");

foreach ($employees as $employee) {
    if($employee->getDepartment() == $highestSalary){
        echo $employee->getInfo() . PHP_EOL;
    }
}