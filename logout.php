<?php
session_start();



$_SESSION["loggedin"] = false;
$_SESSION["user_id"] = "";
$_SESSION["user_name"] = "";

header("Location: index.php");

?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once("header.php");
?>

<html>

<head>
    <title>
        Social Library - User Loggedout
    </title>
</head>

<body>
    <?php
    include_once("top.php");
    ?>
    <h1>You are successfully logged out</h1>

    <?php
    include_once("footer.php");
    ?>

</body>

</html>