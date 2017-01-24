<form action="07-Form-Data.php" method="post">
    Name: <input type="text" name="name"><br>
    Age: <input type="text" name="age"><br>
    <input type="radio" name="gender" value="male"> Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
    <input type="submit" name="submit">
</form>

<?php
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        echo "My name is {$name}. I am {$age} years old. I am {$gender}.";
    }
?>