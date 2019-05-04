<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once("header.php");


if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $locality = $_POST['locality'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `users` (`name`,`locality`,`phone`,`email`,`password`)
    VALUES ('{$name}', '{$locality}','{$phone}','{$email}','{$password}')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<html>

<head>
    <title>
        Social Library - User Registration
    </title>
</head>

<body>

    <?php
    include_once("top.php");
    ?>

    <h2>Registration Form</h2>
    <form method="POST" action="register.php">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="locality" placeholder="Locality">
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="text" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <input type="Submit" name="Submit">
    </form>

    <?php
    include_once("footer.php");
    ?>
</body>


</html>