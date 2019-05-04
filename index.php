<?php
session_start();

?>

<html>

<head>
    <title>
        Social Library
    </title>
</head>

<body>
    <h1>Welcome to Social Library</h1>
    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        echo "Welcome " . $_SESSION["user_name"];
        ?>
        <a href="logout.php">Logout</a>
        <?php
    } else {
        ?>
        <a href="login.php">Login</a><br>
        <a href="register.php">Register</a><br>
    <?php
}
?>
<style>
table, tr, td {border:1px solid blue;}
</style>
<?php
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

 $sql = "SELECT `name`,`writer`,`category`, `copies` FROM book_list";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    echo "<table><tr><th>Book name</th><th>Writer</th><th>Category</th><th>Number of copies</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["writer"]. "</td><td>" . $row["category"]. "</td><td>" . $row["copies"]."</td></tr>"; ?> <br><?php
    }
} else {
    echo "No result found";
}
$conn->close();

?>
    
</body>

</html>