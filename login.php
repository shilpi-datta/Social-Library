<?php
session_start();

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];

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

    $sql = "SELECT `user_id`,`name`,`email`, `password` FROM users WHERE `email`='{$email}' AND `password`='{$pass}' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_name"] = $row["name"];            
        }
        echo "Login successful";
        $_SESSION["loggedin"] = true;
        ?>
        <a href="account.php">My account</a>
    <?php
    } else {
        echo "Login failed";
        $_SESSION["loggedin"] = false;
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
    <form method="POST" action="login.php">
        <input type="text" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <input type="Submit" name="Submit">
    </form> 
    <a href="index.php">Home</a> 
</body>

</html>