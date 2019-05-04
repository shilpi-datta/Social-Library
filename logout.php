<?php
session_start();


$_SESSION["loggedin"] = false;
        $_SESSION["user_id"] = "";
        $_SESSION["user_name"] = "";            
       
?>

<html>

<head>
    <title>
        Social Library - User Loggedout
    </title>
</head>

<body>
    <h1>You are successfully logged out</h1>
    <a href="index.php">Home</a>  
</body>

</html>