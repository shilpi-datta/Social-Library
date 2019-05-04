<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once("header.php");

if (isset($_SESSION["loggedin"]) && isset($_POST['name'])) {

    $name = $_POST['name'];
    $writer = $_POST['writer'];
    $category = $_POST['category'];
    $copies = $_POST['copies'];

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

    $sql = "INSERT INTO `book_list` (`owner_id`,`name`,`writer`,`category`,`copies`)
    VALUES ('{$_SESSION["user_id"]}','{$name}', '{$writer}','{$category}','{$copies}')";

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
        Social Library - Book Register
    </title>
</head>

<body>
    <?php
    include_once("top.php");
    ?>

    <h2>Book Registration Form</h2>
    <form method="POST" action="account.php">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="writer" placeholder="Writer">
        <input type="text" name="category" placeholder="Category">
        <input type="text" name="copies" placeholder="Number of copies">
        <input type="Submit" name="Submit">
    </form>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>