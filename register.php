<?php
session_start();

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
    <h1>Welcome to Social Library</h1>

    <a href="login.php">Login</a>
    <a href="register.php">Register</a>

    <h2>Registration Form</h2>
    <form method="POST" action="register.php">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="locality" placeholder="Locality">
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="text" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <input type="Submit" name="Submit">
    </form>
    <a href="index.php">Home</a>
</body>

</html>