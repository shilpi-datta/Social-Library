<?php
session_start();
require_once("utility/Database.php");
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

    $sql = "INSERT INTO `book_list` (`owner_id`,`name`,`writer`,`category`,`copies`,`date`)
    VALUES ('{$_SESSION["user_id"]}','{$name}', '{$writer}','{$category}','{$copies}', NOW())";

    if ($conn->query($sql) === TRUE) {
       // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<html>

<head>
    <title>
        Social Library - Book Register
    </title>

    <title>Bootstrap Example</title>

</head>

<body>
    <?php
    include_once("top.php");
    ?>
    <div class="container">
        <h2>Book Registration Form</h2>
        <!--<form method="POST" action="lend.php">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="writer" placeholder="Writer">
        <input type="text" name="category" placeholder="Category">
        <input type="text" name="copies" placeholder="Number of copies">
        <input type="Submit" name="Submit">
    </form> -->

        <form method="POST" action="lend.php">
            <div class="form-group">
                <label for="text">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="text">Writer:</label>
                <input type="text" class="form-control" name="writer" placeholder="Writer" required>
            </div>
            <div class="form-group">
                <label for="text">Categiry:</label>
                <input type="text" class="form-control" name="category" placeholder="Category" required>
            </div>
            <div class="form-group">
                <label for="text">Copies:</label>
                <input type="text" class="form-control" name="copies" placeholder="Copies" required>
            </div>

            <button type="Submit" class="btn btn-primary"> + Lend</button>
        </form>
    </div>

    <?php
    include_once("footer.php");
    ?>
</body>

</html>