<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Problem03</title>
</head>
<body>
<b>Input:</b>
<form action="studentExams.php" method="get">
    <input name='string' size="100"
           value="Georgi Petrov - Java : 360,Marina - JavaScript : 200,Marina     -    JavaScript :     300,Vasil Dimitrov - PHP : 120,Vasil Dimitrov-PHP: 550,Vasil Dimitrov - PHP : 250"><br>
    <input type="submit">
</form>
<p><b>Expected Output:</b></p>
<table>
    <tr>
        <th>Subject</th>
        <th>Name</th>
        <th>Result</th>
        <th>MakeUpExams</th>
    <tr>
        <td>Java</td>
        <td>Georgi Petrov</td>
        <td>360</td>
        <td>0</td>
    </tr>
    <tr>
        <td>JavaScript</td>
        <td>Marina</td>
        <td>300</td>
        <td>1</td>
    </tr>
    <tr>
        <td>PHP</td>
        <td>Vasil Dimitrov</td>
        <td>250</td>
        <td>1</td>
    </tr>
</table>
<br/>
<b>Input:</b>
<form action="studentExams.php" method="get">
    <input name='string' size="100"
           value="GJohnny Bravo - PHP : 300,Johnny Bravo-PHP: 600,Nikola Ivanov - PHP: 350,Johnny Bravo - PHP : 400"><br>
    <input type="submit">
</form>
<p><b>Expected Output:</b></p>
<table>
    <tr>
        <th>Subject</th>
        <th>Name</th>
        <th>Result</th>
        <th>MakeUpExams</th>
    <tr>
        <td>PHP</td>
        <td>Johnny Bravo</td>
        <td>400</td>
        <td>1</td>
    </tr>
    <tr>
        <td>PHP</td>
        <td>Nikola Ivanov</td>
        <td>350</td>
        <td>0</td>
    </tr>
</table>
<br/>
</body>
</html>

<?php

class Student
{
    private $name;
    private $exam;
    private $points;
    private $times;

    public function __construct($name, $exam, $points, $times = 1)
    {
        $this->name = $name;
        $this->exam = $exam;
        $this->points = $points;
        $this->times = $times;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getExam()
    {
        return $this->exam;
    }

    public function getPoints(){
        return $this->points;
    }
    public function increaseTimes()
    {
        return $this->times++;
    }
    public function getTimes(){
        return $this->times;
    }
}

class Exam
{
    private $name;
    private $students = array();

    public function __construct($name, Student $student)
    {
        $this->name = $student->getExam();
        $this->students[] = $student;
    }
}

if (isset($_GET['string'])) {
    $input = $_GET['string'];
    $studentsArr = explode(",", $input);

    $examsObj = [];
    $studentsObj = [];

    for ($student = 0; $student < count($studentsArr); $student++) {
        $studentsArr[$student] = preg_split("/(:|-)/", $studentsArr[$student]);

        $currentstudent = $studentsArr[$student];


        //Trim whitespaces from students strings
        for ($string = 0; $string < count($currentstudent); $string++) {
            $currentstudent[$string] = trim($currentstudent[$string]);
        }
        $studentsArr[$student] = $currentstudent;
    }


//    for ($student = 0; $student < count($studentsArr); $student++) {
//        $currentstudent = $studentsArr[$student];
//
//        $currentName = $currentstudent[0];
//        $currentExam = $currentstudent[1];
//        $currentPoints = $currentstudent[2];
//    }
//    var_dump($studentsArr);

    for ($studI = 0; $studI < count($studentsArr); $studI++) {
        $currentStudent = $studentsArr[$studI];

        $name = $currentStudent[0];
        $exam = $currentStudent[1];
        $points = $currentStudent[2];

//        echo "$name $exam $points<br>";
        $studentNew = new Student($name, $exam, $points);
        $studentsObj[] = $studentNew;
    }
    var_dump($studentsObj);

    $result = [];
    for ($stud1 = 0; $stud1 < count($studentsObj); $stud1++){
        $currStud = $studentsObj[$stud1];
        for($nextStud = 0; $nextStud < count($studentsObj); $nextStud++){
            $nextStudent = $studentsObj[$nextStud];

            if ($stud1 != $nextStud){
                $curname = $currStud->getName();
                $nextname = $nextStudent->getName();


                if ($curname == $nextname){
                    $currPoints = $currStud->getPoints();
                    $nextPoints = $nextStudent->getPoints();
                    $bestpoints = max($currPoints, $nextPoints);
                    $currExam = $currStud->getExam();
                    $times = $currStud->getTimes();
                    $times++;
                    $result[] = new Student($curname, $currExam, $bestpoints, $times);
                }
//                else {
//                    $currPoints = $currStud->getPoints();
//                    $currExam = $currStud->getExam();
//                    $times = $currStud->getTimes();
//                    $times++;
//                    $result[] = new Student($curname, $currExam, $currPoints, $times);
//                }
            }
        }
        echo "current student:<br>";
//        var_dump($currStud);
    }
    var_dump($result);
}