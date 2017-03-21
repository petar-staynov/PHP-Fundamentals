<form method="post">

    First Name* <input type="text" name="firstname" required><br>
    Last Name * <input type="text" name="lastname" required><br>
    Phone Number <input type="tel" name="phone" required><br>
    Email* <input type="text" name="email"><br>
    Confirm Email<input type="text" name="email2"><br>
    <br>

    Type of accomodation:
    <select name="accomodation" required>
        <option value="Hotel">Hotel</option>
        <option value="Room">Room</option>
        <option value="Studio">Studio</option>
    </select>
    <br>
    Number of children <input type="number" name="children" required><br>
    Number of adults <input type="number" name="adults" required><br>
    Rooms <input type="number" name="rooms"><br>
    Check in date* <input type="date" name="date1" required><br>
    Check out date* <input type="date" name="date2" required><br>
    <input type="checkbox" name="liftpass">Lift Pass<br>
    <input type="checkbox" name="instructor">Ski instructor<br>
    <input type="submit" name="submit">
    <input type="submit" name="show">
</form>
<?php
if (isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phoneNum = $_POST['phone'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $accomodation = $_POST['accomodation'];
    switch ($accomodation){
        case "Hotel": break;
        case "Room": break;
        case "Studio": break;
    }
    $childrenNum = $_POST['children'];
    $adultsNum = $_POST['adults'];
    $roomsNum = $_POST['rooms'];
    $checkIn = $_POST['date1'];
    $checkOut = $_POST['date2'];
    $liftPass = $_POST['liftpass'];
    $instructor = $_POST['instructor'];


}
if (isset($_POST['show'])){

}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'vacation');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
mysqli_set_charset($db, 'utf8');

//no time for rest :(