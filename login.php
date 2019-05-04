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
        $_SESSION["loggedin"] = true;
        header("Location: index.php");
        ?>        
    <?php
    } else {
        echo "Login failed";
        $_SESSION["loggedin"] = false;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once("header.php");




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

    <h2>Login here</h2>
    <form method="POST" action="login.php">
        <input type="text" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <input type="Submit" name="Submit">
    </form> 
    
<?php
include_once("footer.php");
?>

</body>

</html>